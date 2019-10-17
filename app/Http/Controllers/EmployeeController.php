<?php

namespace App\Http\Controllers;
use App\EmployeeModel;
use Illuminate\Http\Request;
use DB;
use function Sodium\compare;

class EmployeeController extends Controller
{
    public function markAttend(){
        $employee = EmployeeModel::all();
        return view('employee_markattend');
    }
    public function viewAttend(){

        $employee = EmployeeModel::all();

        return view('employee_viewattend',compact('employee'));
    }


}
