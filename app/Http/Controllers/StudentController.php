<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('student.index', [
            'students' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $dataa = Course::find(2)->batch;
        // $datab = Course::find(1)->batch;
        // $migrate =[
        //     'ggg' => json_encode($dataa),
        //     'rrrg' => json_encode($datab),
        // ];
        // dd(json_encode($migrate));
        // dd($data->toJson());

        // $data =[];
        // foreach($courses as $course){
        //     $data += [ $course->name => Course::find($course->id)->batch ];
        // }

        $courses = Course::all();
        return view('student.create', [
            'courses' => $courses,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' =>'required',
            'address' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $student = new Student();
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->address = request()->address;
        $student->batch_id = request()->batch;
        $student->save();
        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Student::find($id);
        return view("student.show",[
            'student'=> $date 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $date = Student::find($id);
        $courses = Course::all();
        return view("student.edit",[
            'student'=> $date,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' =>'required',
            'address' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $student = Student::find($id);
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->address = request()->address;
        $student->batch_id = request()->batch;
        $student->save();
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/student');
    }
}
