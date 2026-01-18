<?php

namespace App\Http\Controllers;

use App\Models\BudgetData;
use App\Models\EconomicCode;
use Illuminate\Http\Request;
use App\Imports\BudgetDataImport;
use App\Exports\BudgetDataTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class BudgetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgetData = BudgetData::paginate(10);
        return view('budget.budget_data.index', compact('budgetData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $economicCodes = EconomicCode::all();
        return view('budget.budget_data.create', compact('economicCodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'ministry' => 'required|string|max:150',
            'economic_code' => 'required|string|max:50|exists:economic_codes,economic_code',
            'description' => 'required|string|max:255',
            'amount' => 'nullable|numeric',
        ]);

        BudgetData::create($validated);

        return redirect()->route('budget-data.index')->with('success', 'Budget Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BudgetData $budgetData)
    {
        return view('budget.budget_data.show', compact('budgetData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BudgetData $budgetData)
    {
        $economicCodes = EconomicCode::all();
        return view('budget.budget_data.edit', compact('budgetData', 'economicCodes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BudgetData $budgetData)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'ministry' => 'required|string|max:150',
            'economic_code' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'amount' => 'nullable|numeric',
        ]);

        $budgetData->update($validated);

        return redirect()->route('budget-data.index')->with('success', 'Budget Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BudgetData $budgetData)
    {
        $budgetData->delete();

        return redirect()->route('budget-data.index')->with('success', 'Budget Data deleted successfully.');
    }

    /**
     * Import Budget Data from Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new BudgetDataImport, $request->file('file'));

        return redirect()->route('budget-data.index')->with('success', 'Budget Data imported successfully.');
    }

    /**
     * Show the import form.
     */
    public function showImportForm()
    {
        return view('budget.budget_data.import');
    }

    /**
     * Download the sample template.
     */
    public function downloadSample()
    {
        return Excel::download(new BudgetDataTemplateExport, 'budget_data_template.xlsx');
    }
}
