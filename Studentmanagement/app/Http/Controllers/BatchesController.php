<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Batches;
use App\Models\Courses;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BatchesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $batches = Batches::all();
        return view('batches.index')->with('batches',$batches);
    }

   /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $courses = Courses::pluck('name','id');
        return view('batches.create', compact('courses'));
        // return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Batches::create($input);
        return redirect('batches')->with('flash_message', 'batches Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batches = Batches::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batches = Batches::find($id);
        return view('batches.edit')->with('batches', $batches);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $batches =Batches::find($id);
    //     $input = $request->all();
    //     $batches->update($input);
    //     return redirect('batches')->with('flash_message', 'batches Updated!');  
    // }
    public function update(Request $request, string $id): RedirectResponse
    {
        $batches = Batches::find($id);
    
        if (!$batches) {
            return redirect('batches')->with('error', 'batches not found!');
        }
    
        $input = $request->except('_token'); // تأكد من عدم تضمين _token أو أي بيانات غير مرغوب فيها
    
        try {
            $batches->update($input);
        } catch (\Exception $e) {
            return redirect('batches')->with('error', 'Update failed: ' . $e->getMessage());
        }
    
        return redirect('batches')->with('flash_message', 'Payment updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Batches::destroy($id);
        return redirect('batches')->with('flash_message', 'batches deleted!');  
    }
}
