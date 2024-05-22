@extends("layouts.index")
@section("content")

<div class="row gap-3 mb-3">
    <div class="card text-bg-primary p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['student'] }}</h5>
                <p class="card-text fs-5">Students</p>
            </div>
            <div class="text-black opacity-50 fa-4x align-items-center">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
    <div class="card text-bg-warning p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['teacher'] }}</h5>
                <p class="card-text fs-5">Teachers</p>
            </div>
            <div class="text-black opacity-50 fa-4x align-items-center">
                <i class="fa-solid fa-graduation-cap "></i>
            </div>
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
    <div class="card text-bg-success p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['course'] }}</h5>
                <p class="card-text fs-5">Course</p>
            </div>
            <div class="text-black opacity-50 fa-5x align-items-center">
                <i class="uil uil-files-landscapes"></i>
            </div>
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
</div>

<div class="row gap-3 ">
    <div class="card text-bg-secondary p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['batch'] }}</h5>
                <p class="card-text fs-5">Batches</p>
            </div>
            <div class="text-black opacity-50 fa-5x align-items-center">
                <i class="fa-solid fa-square-poll-vertical"></i>   
            </div>
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
    <div class="card text-bg-info p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['enrollement'] }}</h5>
                <p class="card-text fs-5">Enrollement</p>
            </div>
            <div class="text-black opacity-50 fa-5x align-items-center">
                <i class="fa-regular fa-file-lines"></i>
            </div>
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
    <div class="card p-0 col">
        <div class="card-body d-flex flex-row justify-content-between">
            <div>
                <h5 class="card-title fs-2">{{ $data['payment'] }}</h5>
                <p class="card-text fs-5">Payment</p>
            </div>
            <div class="text-black opacity-50 fa-4x align-items-center">
                <i class="fa-regular fa-credit-card"></i>
            </div>
        </div>
        <div class="card-footer text-body-secondary d-flex flex-row align-items-center float-right gap-3 justify-content-center">
            <p class="m-0">More Info</p>
            <i class="fa-solid fa-circle-arrow-right"></i>
        </div>
    </div>
</div>

@endsection