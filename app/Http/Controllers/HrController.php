<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\Events;
use App\myMail;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class HrController extends Controller
{
    public function viewEmp(){

        $employee = EmployeeModel::all()
            ->where('designation','Developer');

        return view('hr_viewemployee',compact('employee'));
    }

    public function addEmployee(){
        return view('hr_addemployee');
    }
    public function viewReport(){
        $report = Events::all()
        ->where('time_in','>',"11:00:00");
        return view('hr_viewreport',compact('report'));
    }

    public function deleteReport($id){
        $hr = Events::find($id);
        $hr->delete();
        return redirect('hr_viewreport');
    }

    public function store(Request $request){

        $employee = new EmployeeModel();
        $request->validate([
            "email" => "required"
        ]);
        $employee->name = request('name');
        $employee->email = request('email');
        $employee->username = request('user_name');
        $employee->password = request('password');
        $employee->departmentname = request('dept');
        $employee->designation = request('designation');
        $employee->cover = request('image');
        $employee->salary = request('salary');

        $employee->save();

        return redirect('hr_viewemployee');
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
    public function updateEmployee($id,Request $request){
        $hr = EmployeeModel::find($id);
        $request->validate([
            "email" => "required"
        ]);
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
        $employee = Events::whereDate('created_at', '2019-10-30')
        ->get();
        return view('hr_viewattend',compact('employee'));
    }
    public function viewAttendOfMonth(){
        $mydate = request('daterange');

        $report = Events::whereDate('created_at', $mydate)
            ->get();
        return view('hr_viewreport',compact('report'));
    }


    public function deleteAttend($id){
        $hr = Events::find($id);
        $hr->delete();
        return redirect('hr_viewattend');
    }
    public function editAttend($id){
        $hr = Events::find($id);
        return view('editAttend',compact('hr','id'));
    }
    public function updateAttend($id){
        $hr = Events::find($id);
        $hr->emp_name = request('name');
        $hr->mydate = request('mydate');
        $hr->time_in = request('time_in');
        $hr->time_out = request('time_out');

        $hr->save();

        return redirect('hr_viewattend');
    }
   /* public function addMail(){
        $myMail = new myMail();

        $myMail->to = request('to');
        $myMail->subject = request('subject');
        $myMail->body = request('body');

        $myMail->save();
        return view('hr');
    }*/






    public function markTimein($id)
    {
        /*    dd(request()->all());*/
        $mytime = new Events();

        $endtime = request('EndTime');
        $starttime = request('CurrTime');
        $mydate = request('mydate');
        $emp_id = request('emp_id');
        $emp_name = request('emp_name');
        // dd($endtime,$starttime,$mydate,$emp_id,$emp_name);

        $mytime->time_in = $starttime;
        $mytime->mydate = $mydate;
        $mytime->emp_id = $emp_id;
        $mytime->emp_name = $emp_name;

        if(isset($endtime)){
            $mytime->time_out = $endtime;
        }
        else{
            $mytime->time_out = '';
        }

        $mytime->save();

        return redirect('/hr_markattend/'. $id);
    }

    public function markAttend($id)
    {

        $events = [];
        $employees = EmployeeModel::find($id);


        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'firstday' => 1
            ])->setCallbacks([]);

        $myTime = Events::where('mydate',date('Y-m-d'))
            ->where('emp_id',$id)
            ->latest()->first();
        return view('hr_markattend', [
            'myTime' => $myTime,
            'calendar' => $calendar,
            'emp' => $employees
        ]);
    }

}
