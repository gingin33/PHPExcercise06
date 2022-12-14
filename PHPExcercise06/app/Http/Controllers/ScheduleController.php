<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function getSchedules(){
        $user = User::find(Auth::user()->id);
        
        $schedules = Schedule::where('user_id', $user->id)->oldest('begin')->get();
        return view('dashboard', compact('schedules'));
    }

    public function getWeekSchedules(){
        $user = User::find(Auth::user()->id);
        
        $schedules = Schedule::where('user_id', $user->id)
        ->whereBetween('begin', [date("Y-m-d H:i:s"), date("Y-m-d H:i:s", strtotime("+1 week"))])
        ->oldest('begin')
        ->get();

        return view('dashboard', compact('schedules'));
    }

    public function getMonthSchedules(){
        $user = User::find(Auth::user()->id);
        
        $schedules = Schedule::where('user_id', $user->id)
        ->whereBetween('begin', [date("Y-m-d H:i:s"), date("Y-m-d H:i:s", strtotime("+1 month"))])
        ->oldest('begin')
        ->get();

        return view('dashboard', compact('schedules'));
    }

    public function insertSchedule(){
        return view('crud/createSchedule');
    }
    
    public function doInsertSchedule(Request $request){
        $user = User::find(Auth::user()->id);

        $request->validate([
            'begin' => 'required',
            'place' => 'max:100',
            'content' => 'required | max:100',
        ]);
        Schedule::create([
            'begin' => $request->begin,
            'end' => $request->end,
            'place' => $request->place,
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        $schedules = Schedule::where('user_id', $user->id)->oldest('begin')->get();
        return view('dashboard', compact('schedules'));
    }

    public function editSchedule($id){
        $schedule = Schedule::find($id);
        return view('crud/editSchedule', compact('schedule'));
    }
    public function doEditSchedule(Request $request){
        $user = User::find(Auth::user()->id);

        $request->validate([
            'begin' => 'required',
            'place' => 'max:100',
            'content' => 'required | max:100',
        ]);
        Schedule::where('id', $request->id)->update([
            'begin' => $request->begin,
            'end' => $request->end,
            'place' => $request->place,
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        $user = User::find(Auth::user()->id);
        $schedules = Schedule::where('user_id', $user->id)->oldest('begin')->get();
        return view('dashboard', compact('schedules'));
    }

    public function deleteSchedule($id){
        return view('crud/deleteSchedule', compact('id'));
    }
    public function doDeleteSchedule($id){
        Schedule::destroy($id);

        $user = User::find(Auth::user()->id);
        
        $schedules = Schedule::where('user_id', $user->id)->oldest('begin')->get();
        return view('dashboard', compact('schedules'));
    }

}
