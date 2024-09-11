<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile () {
        return view('pages.home');
    }

    public function management () {
        return view('pages.home');
    }

    public function edit () {
        return view('pages.dashboard');
    }

    public function update (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = auth()->user();
        $user->update($validatedData);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function studentlist () {
        $students = User::where('role', 'student')->get();

        return view('pages.home',compact('students'));
    }

    public function enrollcourse (Request $request, $courseId) {
        $user = auth()->user();
        $course = Course::findOrFail($courseId);

        if (!$user->courses()->where('course_user.course_id', $courseId)->exists()) {
            $user->courses()->attach($courseId);
            return redirect()->route('viewcourselist')->with('success', 'You have successfully enrolled in the course.');
        }
        else {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }
    }

    public function courseenrolledlist () {
        return view('pages.home');

    }

    public function viewcourselist () {
        return view('pages.home');
    }

    public function manageEnrollments () {
        return view('pages.home');
    }

    public function addacourse (Request $request) {

        $validator = Validator::make($request->all(), [
            'course_id' => ['required','string','unique:courses,course_id'],
            'course_name' => ['required','string'],
            'course_details' => ['required','max:150','string'],
            'course_duration' => ['required','string']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Course::create([
            'course_id' => $request->course_id,
            'course_name' => $request->course_name,
            'course_details' => $request->course_details,
            'course_duration' => $request->course_duration,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('manageEnrollments')->with('success', 'Course added successfully.');
    }

    public function gotodesk () {
        return view('pages.home');
    }

    public function downloadpdf () {
        return view('pages.home');
    }

}
