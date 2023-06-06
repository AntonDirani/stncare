<?php 
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class StudentController extends Controller {

  public function student_data_entry(Request $request ,$un_id ,$ph_id)
  {
    try{
    $validate = $request->validate([
      'verification_card'=>'required',
      'studying_year'     =>'required'
    ]);
    
     $student = Student::create([
       'user_id'          =>auth()->user()->id,
       'university_id'    =>$un_id,
       'photo_id'         =>$ph_id,
       'verification_card'=>$validate['verification_card'],
       'studying_year'    =>$validate['studying_year'],
     ]);
    }catch(\Exception $e){
    return ['message'=>'An Error Occoured on Entering student data!'];
    }
     return $student;
  }

  
}

?>