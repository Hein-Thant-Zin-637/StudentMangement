@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Enrollement</h3>
        <a href="{{route('enrollement.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>Start Date</th>
                    <th>Fee</th>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollements as $i=>$enrollement)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>{{ $enrollement->id }}</td>
                    <td>{{ $enrollement->start_date }}</td>
                    <td>{{ $enrollement->fee }} MMK</td>
                    <td>{{ $enrollement->student->name }}</td>
                    <td>{{ $enrollement->student->batch->course->name }}</td>
                    <td>Batch{{ $enrollement->student->batch->name }}</td>
                    <td class="d-flex flex-row gap-3">
                        <a href="{{route('enrollement.show',$enrollement['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('enrollement.edit',$enrollement['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('enrollement.destroy',$enrollement['id'])}}" method="POST">
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