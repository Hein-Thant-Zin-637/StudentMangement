@extends("layouts.index")
@section("content")

<div>
<div id="card" class="card">
        <div class="card-header">Student Detail</div>
        <div class="card-body">
            <p>Name : {{ $student->name }}</p>
            <p>Email : {{ $student->email }}</p>
            <p>Phone : {{ $student->phone }}</p>
            <p>addrss : {{ $student->address }}</p>
            <p>Course : {{ $student->batch->course->name }}</p>
            <p>Batch : {{ $student->batch->name }}</p>
        </div>
</div>

@endsection