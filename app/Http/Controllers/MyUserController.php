<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\Events;
use App\MyUser;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use validator;
use DB;
class MyUserController extends Controller
{
    public function Validation(){
       $employees = EmployeeModel::all();

       //$myTime = Events::all();

       $email = request('email');
       $pass = request('password');
       $desig = request('designation');

        $events = [];


        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'firstday' =>  1
            ])->setCallbacks([]);

       foreach ($employees as $emp){

       //     dd($email,$pass,$desig);
           if(( $email == "$emp->email") && ($pass == "$emp->password") && ($desig == "$emp->designation")){

               return redirect('/employee_markattend/'. $emp->id);
               /*return view('employee_markattend',[
                   'myTime' => $myTime,
                   'calendar' => $calendar,
                   'emp' => $emp
               ]);*/
           }
           else if(($emp->email == "$email") && ($emp->password == "$pass") && ($desig == "hr")){
               return view('hr');
           }
           else if(($emp->email == "$email") && ($emp->password == "$pass") && ($desig == "ceo")){
               return view('admin');
           }
       }
    }

}
