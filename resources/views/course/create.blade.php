@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card">
        <div class="card-header">Add Course</div>
        <div class="card-body">
            <form action="{{route('course.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Course Name" name="name">
                </div>
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" placeholder="Enter Course Description" name="description"></textarea>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration :</label>
                    <input type="number" class="form-control" id="duration" name="duration">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection