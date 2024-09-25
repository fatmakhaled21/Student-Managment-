<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $enrollments = Enrollment::all();
        return view('enrollments.index')->with('enrollments',$enrollments);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('enrollments.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $input = $request->all();
        Enrollment::create($input);
        return redirect('enrollments')->with('flash_message', 'enrollments Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enrollments = Enrollment::with('batch', 'student')->findOrFail($id);
        return view('enrollments.show', ['enrollments' => $enrollments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $enrollments = Enrollment::find($id);
        return view('enrollments.edit')->with('enrollments', $enrollments);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $enrollments = Enrollment::find($id);

    if (!$enrollments) {
        return redirect('enrollments')->with('error', 'enrollments not found!');
    }

    $input = $request->except('_token'); // تأكد من عدم تضمين _token أو أي بيانات غير مرغوب فيها

    try {
        $enrollments->update($input);
    } catch (\Exception $e) {
        return redirect('enrollments')->with('error', 'Update failed: ' . $e->getMessage());
    }

    return redirect('enrollments')->with('flash_message', 'Payment updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'enrollments deleted!');  
    }
}
