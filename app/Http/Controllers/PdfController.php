<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use \PDF;

class PdfController extends Controller
{
    public function generatepdf ($courseId) {
        $user = auth()->check();
        $course = Course::find($courseId);

        if (!$course) {
            return redirect()->back()->withErrors('Course not found.');
        }

        $data = [
            'title' => 'Student List',
            'course_name' => $course->course_name,
            'course_id' => $course->course_id,
            'unique_id' => $courseId,
        ];

        $pdf = PDF::loadView('components.pdf_view', $data);

        $pdf->setPaper('A4','portrait');

        return $pdf->download('studentlist.pdf');
        return redirect()->route('downloadpdf')->with('success', 'PDF downloaded successfully.');
    }
}
