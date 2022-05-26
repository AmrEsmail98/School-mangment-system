<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewShift()
    {
        $data['alldata'] = StudentShift::all();
        return view('backend.setup.shift.View_shift', $data);
    }
    public function AddShift()
    {

        return View('backend.setup.shift.Add_shift');
    }
    public function StoreShift(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Shift Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($nitification);
    }

    public function EditShift($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.Edit_shift', compact('editData'));
    }

    public function UpdateShift(Request $request, $id)
    {
        $data = StudentShift::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Shift Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($nitification);
    }
    public function DeleteShift($id){
        $user = StudentShift::find($id);
        $user->delete();
        $nitification = array(
            'message' => ' Student Shift Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($nitification);
    }
}
