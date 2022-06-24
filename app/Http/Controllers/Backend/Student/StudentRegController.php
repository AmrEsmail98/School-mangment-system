<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function StudentRegView(){
    $data['allData']=AssignStudent::all();
    return view('backend.student.student_reg.student_view',$data);
    }

    public function StudentRegAdd(){
        return view('backend.student.student_reg.student_add');
    }
}
