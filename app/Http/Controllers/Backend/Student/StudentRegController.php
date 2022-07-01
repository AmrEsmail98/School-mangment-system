<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentRegController extends Controller
{
    public function StudentRegView(){
    $data['allData']=AssignStudent::all();
    return view('backend.student.student_reg.student_view',$data);
    }

    public function StudentRegAdd(){
        $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
        $data['groups']=StudentGroup::all();
        $data['shifts']=StudentShift::all();
        return view('backend.student.student_reg.student_add',$data);
    }

    public function StudentRegStore(Request $request){
        DB::transaction(function () use($request) {
        $checkyear=StudentYear::find($request->yaer_id)->name;
        $student= User::where('usertype','Student')->orderBy('id','DESC')->first();
        if($student == null){
            $firstReg = 0;
            $studentId= $firstReg +1 ;
            if ($studentId<10){
                $id_no='000'.$studentId;
            } elseif($studentId<100){
                $id_no='00'.$studentId;
            }
            elseif($studentId<1000){
                $id_no='0'.$studentId;
            }
         }
            else{
                $student=User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
                $studentId= $student +1 ;
                if ($studentId<10){
                    $id_no='000'.$studentId;
                } elseif($studentId<100){
                    $id_no='00'.$studentId;
                }
                elseif($studentId<1000){
                    $id_no='0'.$studentId;
                }
            }
            $final_id_no=$checkyear.$id_no;
            $user=new User();
            $code=rand(0000,9999);
            $user->id_no =$final_id_no;
            $user->password=bcrypt($code);
            $user->usertype='Student';
            $user->code=$code;
            $user->name=$request->name;
            $user->fname=$request->fname;
            $user->lname=$request->lname;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }

            $user->save();
            $assgin_student= new AssignStudent();
            $assgin_student->student_id=$user->id;
            $assgin_student->year_id=$request->year_id;
            $assgin_student->class_id=$request->class_id;
            $assgin_student->group_id=$request->group_id;
            $assgin_student->shift_id=$request->shift;
            $assgin_student->save();

            $descount_student= new DiscountStudent();
            $descount_student->assign_student_id=$assgin_student->id;
            $descount_student->fee_category_id ='1';
            $descount_student->discount= $request->discount;
            $descount_student->save();


});
$notification = array(
    'message' => 'Student Insert Successfuly',
    'alert-type' => 'info'
);

return redirect()->route('student.registration.view')->with($notification);
    }
}
