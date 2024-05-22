@extends("layouts.index")
@section("content")

<div>
<div id="card" class="card">
        <div class="card-header">Teacher Detail</div>
        <div class="card-body">
            <p>Name : {{ $teacher->name }}</p>
            <p>Email : {{ $teacher->email }}</p>
            <p>Phone : {{ $teacher->phone }}</p>
            <p>addrss : {{ $teacher->address }}</p>
        </div>
</div>

@endsection