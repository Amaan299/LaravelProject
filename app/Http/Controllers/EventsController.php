<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use App\Events;
use App\MyUser;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventsController extends Controller
{
    public function markTimein()
    {
        /* dd(request());
         exit;*/
        $mytime = new Events();
        $endtime = request('EndTime');
        $starttime = request('CurrTime');
        $mytime->time_in = $starttime;
        if (isset($endtime)) {
            $mytime->time_out = $endtime;
        } else {
            $mytime->time_out = ' ';
        }

        $mytime->save();

        return redirect('/employee_markattend');
    }

    public function viewEmployee()
    {
        $employee = Events::all();

        return view('employee_viewattend', compact('employee'));
    }

    public function markAttend()
    {

        $events = [];
        $employees = EmployeeModel::all();

        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'firstday' => 1
            ])->setCallbacks([]);
        foreach ($employees as $emp) {
            $id = $emp->id;
            $myTime = Events::where('emp_id', $id)->latest()->first();
            return view('employee_markattend', [
                'myTime' => $myTime,
                'calendar' => $calendar
            ]);

        }
    }
}
