<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function Viewdesignation(){
        $data['alldata'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    public function Adddesignation(){
        return View('backend.setup.designation.add_designation');

    }

    public function Storedesignation(Request $request){
        $validatedData = $request->validate([

            'name' => 'required',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Designation Name Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($nitification);
    }


    public function Editdesignation($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }
    public function Updatedesignation(Request $request,$id){
        $data = Designation::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }
    public function Deletedesignation($id){
        $user = Designation::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Designationt Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
