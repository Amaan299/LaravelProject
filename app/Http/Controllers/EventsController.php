<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventsController extends Controller
{
    public function markTimein(){
       /* dd(request());
        exit;*/
        $mytime = new Events();
        $mytime->time_in = request('CurrTime');
        $mytime->time_out = request('EndTime');
        $mytime->save();
        return view('employee_markattend');
    }
   /* public function markTimeout(){
        $mytime = new Events();
        $mytime->time_out = request('timein');
        $mytime->save();
        return view('events');
    }*/

    public function markAttend(){

        $events = [];

        $events[] = Calendar::event(
            "My Event",
            true,
            '2019-10-20T0900',
            '2019-10-22T0600',
            0
        );

        $calendar = Calendar::addEvents($events)
            ->setOptions([
               'firstday' =>  1
            ])->setCallbacks([]);
        return view('employee_markattend',['calendar' => $calendar]);
    }
}
