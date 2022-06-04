<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExam(){
        $data['alldata'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }
    public function AddExam(){
        return View('backend.setup.exam_type.add_exam');
    }
    public function StoreExam(Request $request){
        $validatedData = $request->validate([

            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Exam Type Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($nitification);
    }

    public function EditExam($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam', compact('editData'));
    }

    public function UpdateExam(Request $request,$id){
        $data = ExamType::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Exam Type Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($nitification);
    }

    public function DeleteExam($id){
        $user = ExamType::find($id);
        $user->delete();
        $nitification = array(
            'message' => 'Exam Type Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($nitification);
    }
}
