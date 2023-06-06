<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use App\Models\Post_photo;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function Post_photo($id,$id1){
        
    //try{
        $photo_id   = Photo:: where('id',$id1)->get('id'); 
        $post       = Post::find($id);
        $photo_Id   =  $photo_id;

        $post->photos()->attach($photo_Id);
    //}catch(\Exception $e){
      //  return response()->json(['message'=>'an error uccored']);

    //}
        return response()->json(['message'=>'photo added successfully! ']);


} 



  public function Add_post(Request $request , $st_id , $tr_id )
  {
    $validate = $request->validate([
      'description'  => 'required',
      
    ]);
    $add = Post::create([
      'student_id'   => $st_id,
      'description'  => $validate['description'],
      'treatment_id' => $tr_id,
    ]);
    //$kh =$this->Post_photo($add->id,$ph_id);
    
    return $add;//$kh ;
  }

  public function Show_posts_details($id)
  {
    $show = Post::where('id',$id)->get();
    return $show;
  }




 public function Edit_post(Request $request ,$id)
 {
  $request->validate([
    'student_id'=>'required',
    'description'=> 'required',
    'treatment_id' => 'required',
   ]);
  Post::where('id',$id)->update([
    'student_id'=>$request->student_id,
    'description'=>$request->description,
    'treatment_id'=>$request->treatment_id
  ]);
  return 'Post updated successfully';
 }

 public function Delete_post($id)
 {
  
    $delete = Post::where('id',$id)->delete();
    return ['Post Deleted successfully'];
 }

 public function Show_post’s_details($id)
 {
    $show = Post::where('id',$id)->get();
    return ['Details',$show];
 }

}

?>