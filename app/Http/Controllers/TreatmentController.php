<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller {



  public function Treatment_photo($id,$id1){
        
    //try{
        $photo_id       = Photo:: where('id',$id1)->get('id'); 
        $treatment      = Treatment::find($id);
        $photo_Id       =  $photo_id;

        $treatment->photos()->attach($photo_Id);
    //}catch(\Exception $e){
      //  return response()->json(['message'=>'an error uccored']);

    //}
        return response()->json(['message'=>'photo added successfully! ']);


} 


  public function Create_Treatment(Request $request)
  {
    try{
    $validate = $request->validate([
      'name'           =>'required|string',
      'description'    =>'required',
      'self_diagnosed' =>'required',

  ]);
    $treatment = Treatment::create([
      'name'           =>$validate['name'],
      'description'    =>$validate['description'],
      'self_diagnosed' =>$validate['self_diagnosed'],
  ]);
}catch(\Exception $e){
    return ['message'  =>'An error accoured when create treatment !'];
}
    return $treatment;
  }
  
  
}

?>