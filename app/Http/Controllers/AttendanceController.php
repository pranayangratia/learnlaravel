<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function attendancerecord (Request $request) {
        return view('pages.home');
    }

    public function attendancestore (Request $request) {
        $validator = Validator::make($request->all(), [
            'course_id' => ['required','string'],
            'date' => ['required','date']
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Attendance::create([
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
        ]);

        return redirect()->route('attendancerecord')->with('success','Attendance recorded');
    }
}
