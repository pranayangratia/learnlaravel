@php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layout.app')

@section('content')
    @if (request()->routeIs('login'))
        <x-login-card />
    @elseif (request()-> routeIs('register'))
        <x-register-card />
    @elseif (request()->routeIs('profile'))
        <x-profile />
    @elseif (request()->routeIs('management'))
        <x-management />
    @elseif (request()->routeIs('studentlist'))
        <x-view-student-list />
    @elseif (request()->routeIs('manageEnrollments'))
        <x-manageEnrollments />
    @elseif (request()->routeIs('gotodesk'))
        <x-study />
    @elseif (request()->routeIs('viewcourselist'))
        <x-view-course-list />
    @elseif (request()->routeIs('courseenrolledlist'))
        <x-view-enrolled-courses />
    @elseif (request()->routeIs('attendancerecord','showAttendanceForm'))
        <x-attendance-record />
    @elseif (request()->routeIs('downloadpdf'))
        <x-download-pdf />
    @endif
@endsection