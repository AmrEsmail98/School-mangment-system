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
        $data['alldata'] = FeeAmount::all();
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

                $fee_amount= new FeeCategory();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id =$request->class_id[$i];
                $fee_amount->amount =$request->amount[$i];
                $fee_amount->save();

            } // End For

        }  //End For
        $nitification = array(
            'message' => 'Fee Amount Saved Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.amount.view')->with($nitification);

    }       //End Methode
}
