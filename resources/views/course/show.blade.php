@extends("layouts.index")
@section("content")

<div>
<div id="card" class="card">
        <div class="card-header">Course Detail</div>
        <div class="card-body">
            <p>Name : {{ $course->name }}</p>
            <p>Description : {{ $course->description }}</p>
            <p> Duration : {{ $course->duration }}Month</p>
        </div>
</div>

@endsection