<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Batch_Teacher;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Batch::all();
        return view('batch.index', [
            'batches' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('batch.create', [
            'courses' => $courses,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = validator(request()->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'course' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::transaction(function () {
            $batch = new Batch();
            $batch->name = request()->name;
            $batch->start_date = request()->start_date;
            $batch->end_date = request()->end_date;
            $batch->course_id = request()->course;
            $batch->save();

            $batch->teachers()->attach(request()->teachers);
        });



        // foreach (request()->teachers as $teacher) {
        //     Batch_Teacher::insert([
        //         'batch_id' => $latest_id,
        //         'teacher_id'=> (int)$teacher
        //     ]);
        // }


        return redirect('/batch');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Batch::find($id);
        return view("batch.show", [
            'batch' => $date
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $date = Batch::find($id);
        return view("batch.edit", [
            'batch' => $date,
            'courses' => $courses,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'course' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // $batch = Batch::find($id);
        // dd($batch);
        DB::transaction(function () use ($id) {
            $batch = Batch::find($id);
            $batch->name = request()->input('name');
            $batch->start_date = request()->input('start_date');
            $batch->end_date = request()->input('end_date');
            $batch->course_id = request()->input('course');
            $batch->save();

            $batch->teachers()->sync(request()->teachers);
        });
        return redirect('/batch');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::find($id);
        $batch->delete();
        return redirect('/batch');
    }
}
