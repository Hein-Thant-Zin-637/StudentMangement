@extends("layouts.index")
@section("content")

<div>
    <div class="d-flex flex-row justify-content-between mb-3">
        <h3>Payment</h3>
        <a href="{{route('payment.create')}}" class="btn btn-success">Add</a>
    </div>
    <div>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Enrollement Id</th>
                    <th>Paid Date</th>
                    <th>Fee</th>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $i=>$payment)
                <tr>
                    <th>{{ $i+1 }}</th>
                    <td>{{ $payment->enrollement_id }}</td>
                    <td>{{ $payment->paid_date }}</td>
                    <td>{{ $payment->fee }} MMK</td>
                    <td>{{ $payment->enrollement->student->name }}</td>
                    <td>{{ $payment->enrollement->student->batch->course->name }}</td>
                    <td>Batch{{ $payment->enrollement->student->batch->name }}</td>
                    <td class="d-flex flex-row gap-3">
                        <a href="{{route('payment.show',$payment['id'])}}" class="btn btn-info">Detail</a>
                        <a href="{{route('payment.edit',$payment['id'])}}" class="btn btn-primary">Update</a>
                        <form action="{{route('payment.destroy',$payment['id'])}}" method="POST">
                             @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{route('payment.print',$payment['id'])}}" class="btn btn-warning">Print</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection