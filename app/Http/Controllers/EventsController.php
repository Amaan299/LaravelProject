<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\Events;
use App\MyUser;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use function Sodium\compare;

class EventsController extends Controller
{
    public function markTimein($id)
    {
     /*    dd(request()->all());*/
     //   dd($id);
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

        return redirect('/employee_markattend/'. $id);
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
            return view('employee_markattend', [
                'myTime' => $myTime,
                'calendar' => $calendar,
                'emp' => $employees
            ]);
    }
}
