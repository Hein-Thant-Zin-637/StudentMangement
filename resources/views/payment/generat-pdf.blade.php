<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        .text-center {
            text-align: center;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .d-flex {
            display: flex !important;
        }

        .flex-row {
            flex-direction: row !important;
        }

        /* .justify-content-between{
            justify-content: space-between !important;
        } */
        .border-bottom {
            border-bottom: 1px solid black;
        }

        .border-top {
            border-top: 2px solid black;
        }

        .py-2 {
            padding: 25px 0;
        }

        .px-3 {
            padding: 0 15px;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .w-100 {
            width: 100% !important;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }
        .about{
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            border-bottom: 1px solid black !important;
            padding: 25px 15px;
            margin-top: 15px;
        }
        .head{
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            padding: 15px 15px;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center fs-2 font-weight-bold my-3">Receipt</div>
        <div class="head">
            <p class="fs-5 float-left">Date : {{ $payment->paid_date }}</p>
            <p class="fs-5 float-right">Enrollement Number : {{ $payment->enrollement_id }}</p>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Name :</label>
            <span class="fs-4 float-right"> {{ $payment->enrollement->student->name  }}</span>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Address :</label>
            <span class="fs-4 float-right"> {{ $payment->enrollement->student->address  }}</span>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Phone :</label>
            <span class="fs-4 float-right"> {{ $payment->enrollement->student->phone  }}</span>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Course :</label>
            <span class="fs-4 float-right"> {{ $payment->enrollement->student->batch->course->name  }}</span>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Batch :</label>
            <span class="fs-4 float-right">Batch {{ $payment->enrollement->student->batch->name  }}</span>
        </div>
        <div class="about">
            <label class="fs-4 float-left">Fee :</label>
            <span class="fs-4 float-right"> {{ $payment->fee  }} MMK</span>
        </div>
        <div class="d-flex flex-row justify-content-between mb-5" style="margin-top: 60px;">
            <label class="fs-3 border-top text-center float-left" style="width: 200px;">Paid By :</label>
            <label class="fs-3 border-top text-center float-right" style="width: 200px;">Received By :</label>
        </div>

    </div>
</body>

</html>