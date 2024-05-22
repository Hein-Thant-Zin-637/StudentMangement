<?php

namespace App\Http\Controllers;

use App\Models\Enrollement;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Enrollement::all();
        return view('enrollement.index', [
            'enrollements' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('enrollement.create', [
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(), [
            'id' => 'required|unique:App\Models\Enrollement,id',
            'start_date' => 'required',
            'fee' =>'required',
            'student_id' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $enrollement = new Enrollement();
        $enrollement->id = request()->id;
        $enrollement->start_date = request()->start_date;
        $enrollement->fee = request()->fee;
        $enrollement->student_id = request()->student_id;
        $enrollement->save();
        return redirect('/enrollement');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Enrollement::find($id);
        return view("enrollement.show",[
            'enrollement'=> $date,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $date = Enrollement::find($id);
        $students = Student::all();
        return view("enrollement.edit",[
            'enrollement'=> $date,
            'students' => $students, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator(request()->all(), [
            'id' => 'required',
            'start_date' => 'required',
            'fee' =>'required',
            'student_id' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $enrollement = Enrollement::find($id);
        $enrollement->id = request()->id;
        $enrollement->start_date = request()->start_date;
        $enrollement->fee = request()->fee;
        $enrollement->student_id = request()->student_id;
        $enrollement->save();
        return redirect('/enrollement');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollement = Enrollement::find($id);
        $enrollement->delete();
        return redirect('/enrollement');
    }
}
