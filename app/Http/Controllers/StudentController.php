<?php

namespace App\Http\Controllers;

use App\Models\Backend\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function applicantList()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $applicants = Applicant::get();
                return view('backend.admin.student.applicantlist', compact('applicants'));
            }
        }
        
    }
}
