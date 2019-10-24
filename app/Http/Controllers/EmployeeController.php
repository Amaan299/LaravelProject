<?php

namespace App\Http\Controllers;
use App\EmployeeModel;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use function Sodium\compare;

class EmployeeController extends Controller
{
    public function markAttend(){
       // $employee = EmployeeModel::all();
        return view('employee_markattend');
    }
    public function viewAttend(){

        $employee = EmployeeModel::all();

        return view('employee_viewattend',compact('employee'));
    }


    public function myMail(){
        $data = array('name'=>"Aman Ullah",'body'=>"Test Mail");
        Mail::send('emails.mail',$data,function ($message){
           $message->to('bsef15m527@pucit.edu.pk',"Artisan Web")
               ->subject('My First Test Mail');
           $message->from('aman.ullah@coeus-solutions.de','Aman Ullah');
        });
        echo "Email sent";
    }
    public function myEmail()
    {
        $name = 'Aman Ullah';
        Mail::to('bsef15m527@pucit.edu.pk')->send(new SendMailable($name));

        return 'Email was sent';
    }
}
