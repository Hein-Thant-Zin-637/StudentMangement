@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Batches</h3>
        <a href="{{route('batch.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($batches as $i=>$batch)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>Batch{{ $batch->name }}</td>
                    <td>{{ $batch->start_date }}</td>
                    <td>{{ $batch->end_date }}</td>
                    <td>{{ $batch->course->name }}</td>
                    <td class="d-flex flex-row gap-3 ">
                        <a href="{{route('batch.show',$batch['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('batch.edit',$batch['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('batch.destroy',$batch['id'])}}" method="POST">
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