@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card">
        <div class="card-header">Teacher Detail</div>
        <div class="card-body">
            <p>Name : Batch {{ $batch->name }}</p>
            <p>Start Date : {{ $batch->start_date }}</p>
            <p>End Date : {{ $batch->end_date }}</p>
            <p>Course : {{ $batch->course->name }}</p>
            <p class="m-0">Teachers </p>
            <ol>
                @foreach ($batch->teachers as $i=>$teacher)
                <li>  {{ $i+1 }} . {{ $teacher->name }}</li>
                @endforeach
            </ol>
        </div>
    </div>

    @endsection