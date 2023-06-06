<?php 
namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
 
  public function Show_treatments()
  {
    $select   = Treatment::all();
    return $select;
  }

  public function Choose_treatment(Request $request)
  {
    try{
    $treatment_id = Treatment::get('name',$request->id);
    }catch(\Exception $e){
      return ['message'=>'An error accoured in choose treatment !'];
    }
    return $treatment_id;

  }

  public function Skip()
  {
    return 'you are skipped';
  }
}

?>