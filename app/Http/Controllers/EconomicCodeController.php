<?php

namespace App\Http\Controllers;

use App\Models\EconomicCode;
use Illuminate\Http\Request;

class EconomicCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $economicCodes = EconomicCode::paginate(10);
        return view('budget.economic_codes.index', compact('economicCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budget.economic_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'economic_code' => 'required|string|max:50|unique:economic_codes,economic_code',
            'description' => 'required|string|max:255',
        ]);

        EconomicCode::create($validated);

        return redirect()->route('economic-codes.index')->with('success', 'Economic Code created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EconomicCode $economicCode)
    {
        return view('budget.economic_codes.show', compact('economicCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EconomicCode $economicCode)
    {
        return view('budget.economic_codes.edit', compact('economicCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EconomicCode $economicCode)
    {
        $validated = $request->validate([
            'economic_code' => 'required|string|max:50|unique:economic_codes,economic_code,' . $economicCode->id,
            'description' => 'required|string|max:255',
        ]);

        $economicCode->update($validated);

        return redirect()->route('economic-codes.index')->with('success', 'Economic Code updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EconomicCode $economicCode)
    {
        $economicCode->delete();

        return redirect()->route('economic-codes.index')->with('success', 'Economic Code deleted successfully.');
    }
}
