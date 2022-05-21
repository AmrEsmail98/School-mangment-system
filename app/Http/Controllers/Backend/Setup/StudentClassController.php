<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class StudentClassController extends Controller
{
    public function ViewStudent()
    {
        $data['alldata'] = StudentClass::all();
        return view('backend.setup.student_class.View_class', $data);
    }
    public function AddStudent()
    {
        return View('backend.setup.student_class.Add_class');
    }
    public function StoreStudent(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Class Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($nitification);
    }
    public function EditStudent($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.Edit_class', compact('editData'));
    }

    public function UpdateStudent(Request $request, $id)
    {
        $data = StudentClass::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Class Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($nitification);
    }

    public function DeleteStudent($id){
        $user = StudentClass::find($id);
        $user->delete();
        $nitification = array(
            'message' => ' Studend Class Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($nitification);
    }
    }

 