<?php

namespace App\Http\Controllers;

use App\Models\DsaVariable;
use Illuminate\Http\Request;

class DsaVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsaVariables = DsaVariable::paginate(10);
        return view('dsa.dsa_variables.index', compact('dsaVariables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dsa.dsa_variables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'variable_code' => 'required|string|max:100|unique:dsa_variables,variable_code',
            'description' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        DsaVariable::create($validated);

        return redirect()->route('dsa-variables.index')->with('success', 'DSA Variable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DsaVariable $dsaVariable)
    {
        return view('dsa.dsa_variables.show', compact('dsaVariable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DsaVariable $dsaVariable)
    {
        return view('dsa.dsa_variables.edit', compact('dsaVariable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DsaVariable $dsaVariable)
    {
        $validated = $request->validate([
            'variable_code' => 'required|string|max:100|unique:dsa_variables,variable_code,' . $dsaVariable->id,
            'description' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
        ]);

        $dsaVariable->update($validated);

        return redirect()->route('dsa-variables.index')->with('success', 'DSA Variable updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DsaVariable $dsaVariable)
    {
        $dsaVariable->delete();

        return redirect()->route('dsa-variables.index')->with('success', 'DSA Variable deleted successfully.');
    }
}
