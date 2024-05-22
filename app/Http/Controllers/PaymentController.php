<?php

namespace App\Http\Controllers;

use App\Models\Enrollement;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $data = Payment::all();
        return view('payment.index', [
            'payments' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Enrollement::all();
        return view('payment.create', [
            'enrollements' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator(request()->all(), [
            'paid_date' => 'required',
            'fee' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $payment = new Payment();
        $payment->enrollement_id = request()->enrollement_id;
        $payment->paid_date = request()->paid_date;
        $payment->fee = request()->fee;
        $payment->save();
        return redirect('/payment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Payment::find($id);
        return view("payment.show",[
            'payment'=> $date,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Payment::find($id);
        $enrollements = Enrollement::all();
        return view("payment.edit",[
            'enrollements'=> $enrollements,
            'payment' => $data, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator(request()->all(), [
            'paid_date' => 'required',
            'fee' =>'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $payment = Payment::find($id);
        $payment->enrollement_id = request()->enrollement_id;
        $payment->paid_date = request()->paid_date;
        $payment->fee = request()->fee;
        $payment->save();
        return redirect('/payment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payment');
    }

    public function print(string $id)
    {
        $payment = Payment::find($id);
        $data = [
            'payment'=> $payment,
        ];

        // return view("payment.generat-pdf",[
        //     'data'=> $data,
        // ]);
        $date = date('Y-m-d');
        $pdf = Pdf ::loadView('payment.generat-pdf', $data);
        return $pdf->download("payment-".$payment->id."-".$date.".pdf");
    }
}
