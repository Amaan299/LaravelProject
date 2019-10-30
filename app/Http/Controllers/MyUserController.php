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
    public function Validation( Request $request){
       $employees = EmployeeModel::all();

       //$myTime = Events::all();

       $email = request('email');
       $pass = request('password');
       $request->validate([
            "email" => "required"
        ]);

        $events = [];


        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'firstday' =>  1
            ])->setCallbacks([]);

       foreach ($employees as $emp){

       //     dd($email,$pass,$desig);
           if(( $email == "$emp->email") && ($pass == "$emp->password") && ($emp->designation == "Developer")){
               return redirect('/employee_markattend/'. $emp->id);
           }
           else if(($emp->email == "$email") && ($emp->password == "$pass") && ($emp->designation == "Hr")){
               return view('hr');
           }
           else if(($emp->email == "$email") && ($emp->password == "$pass") && ($emp->designation == "Ceo")){
               return view('admin');
           }

       }
    }

}
