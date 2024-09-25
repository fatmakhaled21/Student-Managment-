<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Enrollments;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
       {
            $payments = Payment::all();
           return view('payments.index')->with('payments', $payments);
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
      
        $enrollments = Enrollment::pluck('enroll_no','id');
        return view('payments.create', compact('enrollments'));
        // return view('payments.create');
        // $payments = Payment::pluck('enroll_no','id');
        // return view('payments.create',compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'payments Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payments = Payment::find($id);
        return view('payments.edit')->with('payments', $payments);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $payments = Payment::find($id);
    //     $input = $request->all();
    //     $payments->update($input);
    //     return redirect('payments')->with('flash_message', 'payments Updated!');  
    // }
    public function update(Request $request, string $id): RedirectResponse
{
    $payments = Payment::find($id);

    if (!$payments) {
        return redirect('payments')->with('error', 'Payment not found!');
    }

    $input = $request->except('_token'); // تأكد من عدم تضمين _token أو أي بيانات غير مرغوب فيها

    try {
        $payments->update($input);
    } catch (\Exception $e) {
        return redirect('payments')->with('error', 'Update failed: ' . $e->getMessage());
    }

    return redirect('payments')->with('flash_message', 'Payment updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payments deleted!');  
    }
}
