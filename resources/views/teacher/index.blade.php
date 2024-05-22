@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Teachers</h3>
        <a href="{{route('teacher.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $i=>$teacher)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }} Month</td>
                    <td>{{ $teacher->address }}</td>
                    <td class="d-flex flex-row gap-3">
                        <a href="{{route('teacher.show',$teacher['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('teacher.edit',$teacher['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('teacher.destroy',$teacher['id'])}}" method="POST">
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