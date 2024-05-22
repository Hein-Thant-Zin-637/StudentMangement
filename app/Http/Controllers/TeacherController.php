<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::all();
        return view('teacher.index', [
            'teachers' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
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
        $teacher = new Teacher();
        $teacher->name = request()->name;
        $teacher->email = request()->email;
        $teacher->phone = request()->phone;
        $teacher->address = request()->address;
        $teacher->save();
        return redirect('/teacher');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Teacher::find($id);
        return view("teacher.show",[
            'teacher'=> $date 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $date = Teacher::find($id);
        return view("teacher.edit",[
            'teacher'=> $date 
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
        $teacher = Teacher::find($id);
        $teacher->name = request()->input('name');
        $teacher->email = request()->input('email');
        $teacher->phone = request()->input('phone');
        $teacher->address = request()->input('address');
        $teacher->save();
        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teacher');
    }
}
