<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFee()
    {
        $data['alldata'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee',$data);
    }
    public function AddFee()
    {
        return View('backend.setup.fee_category.add_fee');
    }

    public function StoreFee(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Fee Category Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.category.view')->with($nitification);
    }

    public function EditFee($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee', compact('editData'));
    }
    public function UpdateFee(Request $request, $id)
    {
        $data = FeeCategory::find($id);
        $data->name = $request->name;
        $data->save();
        $nitification = array(
            'message' => 'Fee Category Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.view')->with($nitification);
    }
    public function DeleteFee($id){
        $user = FeeCategory::find($id);
        $user->delete();
        $nitification = array(
            'message' => ' Fee Category Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.category.view')->with($nitification);
    }
}
