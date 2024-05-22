@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card ">
        <div class="card-header">Add Batches</div>
        <div class="card-body">
            <form action="{{route('batch.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="number" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date :</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date :</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course :</label>
                    <select id="select" class="form-select" name="course">
                        <option value="disable" selected disabled>Chose a Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    @foreach($teachers as $teacher)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="teacher{{ $teacher->id }}" name="teachers[]" value="{{ $teacher->id }}">
                        <label class="form-check-label" for="teacher{{ $teacher->id }}">{{ $teacher->name }}</label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection