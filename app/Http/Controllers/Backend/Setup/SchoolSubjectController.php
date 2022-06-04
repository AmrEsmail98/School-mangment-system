<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSubject(){
        $data['alldata'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_subject',$data);
    }
    public function AddSubject(){
        return View('backend.setup.school_subject.add_subject');
    }

    public function StoreSubject(Request $request){
        $validatedData = $request->validate([

            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'School Subject Name Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($nitification);
    }
    public function EditSubject($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_subject', compact('editData'));
    }
    public function UpdateSubject(Request $request,$id){
        $data = SchoolSubject::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'School Subject Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($nitification);
    }
    public function DeleteSubject($id){
        $user = SchoolSubject::find($id);
        $user->delete();
        $nitification = array(
            'message' => 'School Subject Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($nitification);
    }
}
