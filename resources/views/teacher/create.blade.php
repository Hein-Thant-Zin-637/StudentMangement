@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card ">
        <div class="card-header">Add Teacher</div>
        <div class="card-body">
            <form action="{{route('teacher.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Teacher Name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="text" class="form-control " id="email" placeholder="Enter Teacher Email" name="email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone :</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Teacher Phone number" name="phone">
                </div>
                <label for="address">Address:</label>
                <textarea class="form-control mb-3" rows="5" id="address" placeholder="Enter Teacher Address" name="address"></textarea>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@endsection