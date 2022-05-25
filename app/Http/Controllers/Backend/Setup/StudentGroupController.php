<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['alldata'] = StudentGroup::all();
        return view('backend.setup.group.View_group', $data);
    }
    public function AddGroup(){
        return View('backend.setup.group.Add_group');

    }
    public function StoreGroup(Request $request){
        $validatedData = $request->validate([

            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Group Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($nitification);
    }

    public function EditGroup($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.Edit_group', compact('editData'));
    }

    public function UpdateGroup(Request $request,$id){
        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Group Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($nitification);
    }
    public function DeleteGroup($id){
        $user = StudentGroup::find($id);
        $user->delete();
        $nitification = array(
            'message' => ' Student Class Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($nitification);
    }
}
