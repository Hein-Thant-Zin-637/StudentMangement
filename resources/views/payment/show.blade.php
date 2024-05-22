@extends("layouts.index")
@section("content")

<div>
<div id="card" class="card">
        <div class="card-header">Enrollement Detail</div>
        <div class="card-body">
            <p>Enrollement id : {{ $payment->enrollement_id }}</p>
            <p>Paid Date : {{ $payment->paid_date }}</p>
            <p>Fee : {{ $payment->fee }}</p>
            <p>Student : {{ $payment->enrollement->student->name }}</p>
            <p>Course : {{ $payment->enrollement->student->batch->course->name}}</p>
            <p>Batch : Batch{{$payment->enrollement->student->batch->name }}</p>
        </div>
</div>

@endsection