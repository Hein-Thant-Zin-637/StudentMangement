@extends("layouts.index")
@section("content")

<div>
    <div id="card" class="card ">
        <div class="card-header">Add Student</div>
        <div class="card-body">
        <form action="{{route('student.update',$student['id'])}}" method="POST">
                @csrf
                @method("PATCH")
                <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Student Name" name="name" value="{{ $student->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="text" class="form-control " id="email" placeholder="Enter Student Email" name="email" value="{{ $student->email }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone :</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Student Phone number" name="phone" value="{{ $student->phone }}">
                </div>
                <label for="address">Address:</label>
                <textarea class="form-control mb-3" rows="5" id="address" placeholder="Enter Student Address" name="address">{{ $student->address }}</textarea>
                <div class="mb-3">
                    <label for="course" class="form-label">Course :</label>
                    <select  class="form-select" name="course" id="select" onchange="chosebatch()">
                        <option value="disable" selected disabled>Chose a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->name  }}"   <?php if($course->id == $student->batch->course->id ) echo "selected" ?> >{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div >
                
                @foreach($courses as $course)
                <div class="mb-3" id="{{ $course->name }}" style="display: <?php if($course->id == $student->batch->course->id ){ echo "block"; }else{ echo "none" ;} ?> ;">
                    <label for="batch" class="form-label">{{ $course->name }} :</label>
                    <select class="form-select" name="batch">
                        <option value="disable" selected disabled>Chose a batch</option>
                        @foreach($course->batches as $batch)
                            <option value="{{ $batch->id }}" <?php if($batch->id == $student->batch->id ) echo "selected" ?>>Batch{{ $batch->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                <div id="disable"></div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
    </div>
</div>

<script>
function chosebatch() {
  var x = document.getElementById("select").value;
  let selectElement = document.querySelector('[name=course]');
  let optionValues = [...selectElement.options].map(o => o.value);
  optionValues.forEach(myFunction);
  function myFunction(value, index, array) {
    document.getElementById(value).style.display = "none";
    if( x == value){
      document.getElementById(value).style.display = "block";
   }
}


}
</script>

@endsection