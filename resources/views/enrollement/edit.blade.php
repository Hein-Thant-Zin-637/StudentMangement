@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card ">
        <div class="card-header">Update Enrollement</div>
        <div class="card-body">
            <form action="{{route('enrollement.update',$enrollement['id'])}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label for="id" class="form-label">id :</label>
                    <input type="number" class="form-control" id="id" placeholder="Enter Enrollement ID" name="id" value="{{ $enrollement->id }}">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date :</label>
                    <input type="date" class="form-control " id="start_date"  name="start_date" value="{{ $enrollement->start_date }}">
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Fee :</label>
                    <input type="number" class="form-control" id="fee"  name="fee" value="{{ $enrollement->fee }}">
                </div>
                <div class="mb-3">
                    <label for="student_id" class="form-label">Student :</label>
                    <select id="select" class="form-select" name="student_id">
                        <option value="disable" selected disabled>Chose a Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}"   <?php if($student->id == $enrollement->student->id ) echo "selected" ?> >{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection