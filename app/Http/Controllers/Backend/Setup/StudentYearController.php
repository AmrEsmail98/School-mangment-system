<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewYear()
    {
        $data['alldata'] = StudentYear::all();
        return View('backend.setup.year.view_year',  $data);
    }
    public function AddYear()
    {
        return View('backend.setup.year.add_year');
    }

    public function StoreYear(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Year Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($nitification);
    }
    public function EditYear($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }
    public function UpdateYear(Request $request, $id)
    {
        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Student Year Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($nitification);
    }
    public function DeleteYear($id){
        $user = StudentYear::find($id);
        $user->delete();
        $nitification = array(
            'message' => ' Studend Year Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($nitification);
    }
}
