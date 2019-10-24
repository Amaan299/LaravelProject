<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\Events;
use Illuminate\Http\Request;
class HrController extends Controller
{
    public function viewEmp(){

        $employee = EmployeeModel::all()
            ->where('designation','Developer' || 'Manager');

        return view('hr_viewemployee',compact('employee'));
    }

    public function addEmployee(){
        return view('hr_addemployee');
    }
    public function viewReport(){
        return view('hr_viewreport');
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
        return view('hr_addemployee');
    }

    public function deleteEmployee($id){
        $hr = EmployeeModel::find($id);
        $hr->delete();
        return redirect('hr_viewemployee');
    }
    public function editEmployee($id){
        $hr = EmployeeModel::find($id);
        return view('editEmployee',compact('hr','id'));
    }
    public function updateEmployee($id){
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

        return redirect('hr_viewemployee');
    }
    public function viewAttend(){
        $employee = Events::all();
        return view('hr_viewattend',compact('employee'));
    }
}
