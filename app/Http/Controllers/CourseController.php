<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::all();
        return view('course.index', [
            'courses' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = validator(request()->all(), [
            'name' => 'required',
            'description' => 'required',
            'duration' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $course = new Course();
        $course->name = request()->name;
        $course->description = request()->description;
        $course->duration = request()->duration;
        $course->save();
        return redirect('/course');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Course::find($id);
        return view("course.show",[
            'course'=> $date 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $date = Course::find($id);
        return view("course.edit",[
            'course'=> $date 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'description' => 'required',
            'duration' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $course = Course::find($id);
        $course->name = request()->input('name');
        $course->description = request()->input('description');
        $course->duration = request()->input('duration');
        $course->save();
        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/course');
    }
}
