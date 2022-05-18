<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function UserView()
    {
        $data['alldata'] = User::all();
        return View('backend.user.view_user',  $data);
    }

    public function UserAdd()
    {
        return View('backend.user.add_user');
    }
    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required',
            // dd($request),
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $nitification = array(
            'message' => 'User Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($nitification);
    }
    public function UserEdit($id){
        $editData=User::find($id);
        return view('backend.user.edit_user',compact('editData'));

    }
    public function UserUpdate(Request $request ,$id){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $nitification = array(
            'message' => 'User Updated Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($nitification);
    }

    public function UserDelete($id){

        $user=User::find($id);
        $user->delete();
        $nitification = array(
            'message' => 'User Deleted Successfuly',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($nitification);
    }
}
