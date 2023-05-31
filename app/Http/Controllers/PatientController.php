<?php 
namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller {

  public function patient_data_entry(Request $request)
  {
    try{
    $validate = $request->validate([
      'date_of_birth'=>'required',
      'location'     =>'required'
    ]);

    $patient = Patient::create([
      'user_id'      =>auth()->user()->id,
      'date_of_birth'=>$validate['date_of_birth'],
      'location'     =>$validate['location'],
    ]);
  }catch(\Exception $e){
    return ['message'=>'An Error Occoured on Entering patient data!'];
  }
    return response()->json([$patient,'message'=>'Data Added Successfully!']);
  }
 
}

?>