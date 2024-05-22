@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Courses</h3>
        <a href="{{route('course.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $i=>$course)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration }} Month</td>
                    <td class="d-flex flex-row gap-3">
                        <a href="{{route('course.show',$course['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('course.edit',$course['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('course.destroy',$course['id'])}}" method="POST">
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