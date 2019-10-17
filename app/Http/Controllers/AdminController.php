<?php

namespace App\Http\Controllers;
use App\AdminModel;
use App\EmployeeModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewHr(){
        $hr = EmployeeModel::all()
            ->where('designation','HR');
        return view('admin_viewhr',compact('hr'));
    }

    public function addHr(){
        return view('admin_addhr');
    }

    public function editHr($id){
        $hr = EmployeeModel::find($id);
        return view('editHr',compact('hr','id'));
    }
    public function updateHr($id){
        $hr = EmployeeModel::find($id);
        $hr->name = request('name');
        $hr->email = request('email');
        $hr->username = request('user_name');
        $hr->password = request('password');
        $hr->departmentname = request('dept');
        $hr->designation = request('designation');
        $hr->cover = request('image');
        $hr->salary = request('salary');

        $hr->save();

        return redirect('admin_viewhr');
    }

    public function store(){

        $employee = new EmployeeModel();

        $employee->name = request('name');
        $employee->email = request('email');
        $employee->username = request('user_name');
        $employee->password = request('password');
        $employee->departmentname = request('dept');
        $employee->designation = request('designation');
        $employee->cover = request('image');
        $employee->salary = request('salary');

        $employee->save();

        return view('admin_addhr');

    }

    public function deleteHr($id){
        $hr = EmployeeModel::find($id);
        $hr->delete();
        return redirect('admin_viewhr');
    }

}
