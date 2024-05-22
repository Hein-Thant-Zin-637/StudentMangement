<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Enrollement;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $course = Course::all()->count();
        $batch = Batch::all()->count();
        $enrollement = Enrollement::all()->count();
        $payment = Payment::all()->count();
        
        $data=[
            'student'=>$student,
            'teacher'=>$teacher,
            'course'=>$course,
            'batch'=>$batch,
            'enrollement'=>$enrollement,
            'payment'=>$payment
        ];


        return view('dashboard.index', [
            'data' => $data,
        ]);
    }
}
