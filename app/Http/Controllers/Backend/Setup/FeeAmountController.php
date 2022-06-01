<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeamount()
    {
        $data['alldata'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_amount', $data);
    }

    public function AddFeeamount()
    {
        $data['fee_categories'] = FeeCategory::all();

        $data['classes'] = StudentClass::all();
        return View('backend.setup.fee_amount.add_amount', $data);
    }

    public function Storeamount(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != Null) {

            for ($i = 0; $i < $countClass; $i++) {

                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } // End For

        }  //End For
        $notification = array(
            'message' => 'Fee Amount Saved Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }       //End Methode

    public function Editamount($fee_category_id)
    {
        $data['editData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();

        $data['classes'] = StudentClass::all();
        return View('backend.setup.fee_amount.edit_amount', $data);
    }

    public function Updateamount(Request $request, $fee_category_id)
    {
        if ($request->class_id == Null) {
            $notification = array(
                'message' => 'Sorry you do not select any class amount',
                'alert-type' => 'error'
            );

            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        } else {
            $countClass = count($request->class_id);

            for ($i = 0; $i < $countClass; $i++) {
                FeeAmount::where('fee_categoru_id', $fee_category_id)->delete();
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } // End For
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function Detalisamount($fee_category_id){

        $data['detailsData'] = FeeAmount::where('fee_category_id', $fee_category_id)
        ->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.detalis_amount',$data);

    }
}
