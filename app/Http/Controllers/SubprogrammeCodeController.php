<?php

namespace App\Http\Controllers;

use App\Models\SubprogrammeCode;
use Illuminate\Http\Request;

class SubprogrammeCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subprogrammeCodes = SubprogrammeCode::paginate(10);
        return view('budget.subprogramme_codes.index', compact('subprogrammeCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budget.subprogramme_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subprogramme_code' => 'required|string|max:50|unique:subprogramme_codes,subprogramme_code',
            'subprogramme_description' => 'required|string|max:255',
        ]);

        SubprogrammeCode::create($validated);

        return redirect()->route('subprogramme-codes.index')->with('success', 'Subprogramme Code created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubprogrammeCode $subprogrammeCode)
    {
        return view('budget.subprogramme_codes.show', compact('subprogrammeCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubprogrammeCode $subprogrammeCode)
    {
        return view('budget.subprogramme_codes.edit', compact('subprogrammeCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubprogrammeCode $subprogrammeCode)
    {
        $validated = $request->validate([
            'subprogramme_code' => 'required|string|max:50|unique:subprogramme_codes,subprogramme_code,' . $subprogrammeCode->id,
            'subprogramme_description' => 'required|string|max:255',
        ]);

        $subprogrammeCode->update($validated);

        return redirect()->route('subprogramme-codes.index')->with('success', 'Subprogramme Code updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubprogrammeCode $subprogrammeCode)
    {
        $subprogrammeCode->delete();

        return redirect()->route('subprogramme-codes.index')->with('success', 'Subprogramme Code deleted successfully.');
    }
}
