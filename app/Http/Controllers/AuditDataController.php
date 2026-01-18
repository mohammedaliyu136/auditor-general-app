<?php

namespace App\Http\Controllers;

use App\Models\AuditData;
use App\Models\AuditLineItem;
use Illuminate\Http\Request;
use App\Imports\AuditDataImport;
use App\Exports\AuditDataTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class AuditDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditData = AuditData::paginate(10);
        return view('audit.audit_data.index', compact('auditData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lineItems = AuditLineItem::all();
        return view('audit.audit_data.create', compact('lineItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'state' => 'required|string|max:100',
            'statement_type' => 'required|string|max:100',
            'line_item_code' => 'required|string|max:100|exists:audit_line_items,line_item_code',
            'line_item_description' => 'required|string|max:255',
            'fund' => 'nullable|string|max:100',
            'amount' => 'nullable|numeric',
        ]);

        AuditData::create($validated);

        return redirect()->route('audit-data.index')->with('success', 'Audit Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditData $auditData)
    {
        return view('audit.audit_data.show', compact('auditData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditData $auditData)
    {
        $lineItems = AuditLineItem::all();
        return view('audit.audit_data.edit', compact('auditData', 'lineItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditData $auditData)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'state' => 'required|string|max:100',
            'statement_type' => 'required|string|max:100',
            'line_item_code' => 'required|string|max:100|exists:audit_line_items,line_item_code',
            'line_item_description' => 'required|string|max:255',
            'fund' => 'nullable|string|max:100',
            'amount' => 'nullable|numeric',
        ]);

        $auditData->update($validated);

        return redirect()->route('audit-data.index')->with('success', 'Audit Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditData $auditData)
    {
        $auditData->delete();

        return redirect()->route('audit-data.index')->with('success', 'Audit Data deleted successfully.');
    }

    /**
     * Import Audit Data from Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new AuditDataImport, $request->file('file'));

        return redirect()->route('audit-data.index')->with('success', 'Audit Data imported successfully.');
    }

    /**
     * Show the import form.
     */
    public function showImportForm()
    {
        return view('audit.audit_data.import');
    }

    /**
     * Download the sample template.
     */
    public function downloadSample()
    {
        return Excel::download(new AuditDataTemplateExport, 'audit_data_template.xlsx');
    }
}
