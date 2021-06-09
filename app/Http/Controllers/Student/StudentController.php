<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    protected function guard()
    {
        return Auth::guard('student');
    }
   
    public function index()
    {
        $user = Auth::user();
        $total_marks = $user->results->sum('marks');
        $percentage = $user->results->avg('marks');
        return view('student.home', compact('user', 'total_marks', 'percentage'));
    }
}
