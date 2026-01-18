<?php

namespace App\Http\Controllers;

use App\Models\MtbMacroAssumption;
use Illuminate\Http\Request;
use App\Imports\MtbMacroAssumptionImport;
use App\Exports\MtbMacroAssumptionTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class MtbMacroAssumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $macroAssumptions = MtbMacroAssumption::paginate(10);
        return view('mtb.macro_assumptions.index', compact('macroAssumptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mtb.macro_assumptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'variable' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        MtbMacroAssumption::create($validated);

        return redirect()->route('macro-assumptions.index')->with('success', 'Macro Assumption created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MtbMacroAssumption $macroAssumption)
    {
        return view('mtb.macro_assumptions.show', compact('macroAssumption'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MtbMacroAssumption $macroAssumption)
    {
        return view('mtb.macro_assumptions.edit', compact('macroAssumption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MtbMacroAssumption $macroAssumption)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'variable' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $macroAssumption->update($validated);

        return redirect()->route('macro-assumptions.index')->with('success', 'Macro Assumption updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MtbMacroAssumption $macroAssumption)
    {
        $macroAssumption->delete();

        return redirect()->route('macro-assumptions.index')->with('success', 'Macro Assumption deleted successfully.');
    }

    /**
     * Import Macro Assumptions from Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new MtbMacroAssumptionImport, $request->file('file'));

        return redirect()->route('macro-assumptions.index')->with('success', 'Macro Assumptions imported successfully.');
    }

    /**
     * Show the import form.
     */
    public function showImportForm()
    {
        return view('mtb.macro_assumptions.import');
    }

    /**
     * Download the sample template.
     */
    public function downloadSample()
    {
        return Excel::download(new MtbMacroAssumptionTemplateExport, 'macro_assumptions_template.xlsx');
    }
}
