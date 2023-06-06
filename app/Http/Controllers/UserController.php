<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller {



  public function Register(Request $request)
{
  try{
        $validate = $request->validate([
            'name'         => 'required|string',
            'email'        => 'required|string|unique:users,email',
            'password'     => 'required',
            'phone_number' => 'string',
            'role'         => 'string',
        ]);

        $user = User::create([
            'name'         => $validate['name'],
            'email'        => $validate['email'],
            'password'     => bcrypt($validate['password']),
            'phone_number' => $validate['phone_number'],
            'role'         => $validate['role'],
        ]);

        $token = $user->createToken('mytoken@FO123')->accessToken;

        $response = [
            'User Details :' => $user,
            'The Token'      => $token,
        ];
    }catch(\Exception $e){
        return response()->json(['message'=>'an error uccured in register']);
      }
        return $response;     
}

public function Login(Request $request)
{
  try{
  $validate = $request->validate([
    'email'    =>'required|string',
    'password' =>'required'
  ]);

  //Check Email
  $user = User::where('email',$validate['email'])->first();
  
  if(!$user){
    return response()->json(['message'=>'User Email not found! ']);
  }
  //Check Pass
  if(!Hash::check($validate['password'], $user->password)){
    return response()->json(['message'=>'Password incorrect!']);
  }
  $token    = $user->createToken('mytoken@FO123')->accessToken;
  $response = [
    'User Details'=>$user,
    'The Token'   =>$token
  ];
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccured in login!']);
  }
    return $response;
}


public function Logout(Request $request)
{
  try{
  auth()->user()->tokens()->delete();
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccored in logout!']);
  }
  return [
    'message'=>'Logged out !'
  ];
}

}
?>