@extends("layouts.index")
@section("content")

<div>
<div id="card" class="card">
        <div class="card-header">Enrollement Detail</div>
        <div class="card-body">
            <p>id : {{ $enrollement->id }}</p>
            <p>Start Date : {{ $enrollement->start_date }}</p>
            <p>Fee : {{ $enrollement->fee }}</p>
            <p>Student : {{ $enrollement->student->name }}</p>
            <p>Course : {{ $enrollement->student->batch->course->name}}</p>
            <p>Batch : Batch{{$enrollement->student->batch->name }}</p>
        </div>
</div>

@endsection