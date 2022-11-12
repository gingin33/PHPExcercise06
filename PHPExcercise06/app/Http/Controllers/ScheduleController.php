<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function doInsertSchedule(Request $request){
        $user = User::where('id', Auth::user()->id)->first();

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

        $schedules = Schedule::where('user_id', $user->id)->get();
        return view('dashboard', compact('schedules'));
    }
    public function getSchedules(){
        $user = User::where('id', Auth::user()->id)->first();
        
        $schedules = Schedule::where('user_id', $user->id)->get();
        return view('dashboard', compact('schedules'));
    }
    public function insertSchedule(){
        return view('crud/createSchedule');
    }

}
