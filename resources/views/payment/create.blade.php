@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card ">
        <div class="card-header">Add Payment</div>
        <div class="card-body">
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="enrollement_id" class="form-label">Student :</label>
                    <select id="select" class="form-select" name="enrollement_id">
                        <option value="disable" selected disabled>Chose a Enrollement Number</option>
                        @foreach($enrollements as $enrollement)
                            <option value="{{ $enrollement->id }}">{{ $enrollement->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="paid_date" class="form-label">Paid Date :</label>
                    <input type="date" class="form-control " id="paid_date"  name="paid_date">
                </div>
                <div class="mb-3">
                    <label for="fee" class="form-label">Fee :</label>
                    <input type="number" class="form-control" id="fee"  name="fee">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection