<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\FeeCategory;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){

        $data['alldata'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);
    }
    public function AddAssignSubject(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return View('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function StoresignSubject(Request $request){

        $subjectCount = count($request->subject_id);
        if ($subjectCount != Null) {

            for ($i = 0; $i < $subjectCount; $i++) {

                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            } // End For

        }  //End For
        $notification = array(
            'message' => 'Assugn subject Saved Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function EditAssignSubject($class_id){
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return View('backend.setup.assign_subject.edit_assign_subject', $data);
    }

    public function UpdateAssignSubject(Request $request,$class_id){

        if ($request->subject_id == Null) {
            $notification = array(
                'message' => 'Sorry you do not select any Subject',
                'alert-type' => 'error'
            );

            return redirect()->route('assign.subject.edit', $class_id)->with($notification);
        } else
        {
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id', $class_id)->delete();
            for ($i = 0; $i <$countClass; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            } // End For
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }

    public function DetalisAssignSubject($class_id){
        $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();

        return view('backend.setup.assign_subject.details_assign_subject',$data);
    }
}
