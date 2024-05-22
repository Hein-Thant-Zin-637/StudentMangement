@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Students</h3>
        <a href="{{route('student.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $i=>$student)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->batch->course->name }}</td>
                    <td>Batch {{ $student->batch->name }}</td>
                    <td class="d-flex flex-row gap-3">
                        <a href="{{route('student.show',$student['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('student.edit',$student['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('student.destroy',$student['id'])}}" method="POST">
                             @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection