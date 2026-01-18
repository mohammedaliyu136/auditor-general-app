<?php

namespace App\Http\Controllers;

use App\Models\DsaData;
use App\Models\DsaVariable;
use Illuminate\Http\Request;
use App\Imports\DsaDataImport;
use App\Exports\DsaDataTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class DsaDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dsaData = DsaData::paginate(10);
        return view('dsa.dsa_data.index', compact('dsaData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dsaVariables = DsaVariable::all();
        return view('dsa.dsa_data.create', compact('dsaVariables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'state' => 'required|string|max:100',
            'variable_type' => 'required|string|max:100',
            'variable_code' => 'required|string|max:100|exists:dsa_variables,variable_code',
            'description' => 'required|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        DsaData::create($validated);

        return redirect()->route('dsa-data.index')->with('success', 'DSA Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DsaData $dsaData)
    {
        return view('dsa.dsa_data.show', compact('dsaData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DsaData $dsaData)
    {
        $dsaVariables = DsaVariable::all();
        return view('dsa.dsa_data.edit', compact('dsaData', 'dsaVariables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DsaData $dsaData)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'state' => 'required|string|max:100',
            'variable_type' => 'required|string|max:100',
            'variable_code' => 'required|string|max:100|exists:dsa_variables,variable_code',
            'description' => 'required|string|max:255',
            'value' => 'nullable|numeric',
        ]);

        $dsaData->update($validated);

        return redirect()->route('dsa-data.index')->with('success', 'DSA Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DsaData $dsaData)
    {
        $dsaData->delete();

        return redirect()->route('dsa-data.index')->with('success', 'DSA Data deleted successfully.');
    }

    /**
     * Import DSA Data from Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new DsaDataImport, $request->file('file'));

        return redirect()->route('dsa-data.index')->with('success', 'DSA Data imported successfully.');
    }

    /**
     * Show the import form.
     */
    public function showImportForm()
    {
        return view('dsa.dsa_data.import');
    }

    /**
     * Download the sample template.
     */
    public function downloadSample()
    {
        return Excel::download(new DsaDataTemplateExport, 'dsa_data_template.xlsx');
    }
}
