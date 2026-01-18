<?php

namespace App\Http\Controllers;

use App\Models\MtbRevenueProjection;
use Illuminate\Http\Request;
use App\Imports\MtbRevenueProjectionImport;
use App\Exports\MtbRevenueProjectionTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class MtbRevenueProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenueProjections = MtbRevenueProjection::paginate(10);
        return view('mtb.revenue_projections.index', compact('revenueProjections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mtb.revenue_projections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'revenue_code' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'projected_amount' => 'nullable|numeric',
        ]);

        MtbRevenueProjection::create($validated);

        return redirect()->route('revenue-projections.index')->with('success', 'Revenue Projection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MtbRevenueProjection $revenueProjection)
    {
        return view('mtb.revenue_projections.show', compact('revenueProjection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MtbRevenueProjection $revenueProjection)
    {
        return view('mtb.revenue_projections.edit', compact('revenueProjection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MtbRevenueProjection $revenueProjection)
    {
        $validated = $request->validate([
            'fiscal_year' => 'required|integer',
            'revenue_code' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'projected_amount' => 'nullable|numeric',
        ]);

        $revenueProjection->update($validated);

        return redirect()->route('revenue-projections.index')->with('success', 'Revenue Projection updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MtbRevenueProjection $revenueProjection)
    {
        $revenueProjection->delete();

        return redirect()->route('revenue-projections.index')->with('success', 'Revenue Projection deleted successfully.');
    }

    /**
     * Import Revenue Projections from Excel file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new MtbRevenueProjectionImport, $request->file('file'));

        return redirect()->route('revenue-projections.index')->with('success', 'Revenue Projections imported successfully.');
    }

    /**
     * Show the import form.
     */
    public function showImportForm()
    {
        return view('mtb.revenue_projections.import');
    }

    /**
     * Download the sample template.
     */
    public function downloadSample()
    {
        return Excel::download(new MtbRevenueProjectionTemplateExport, 'revenue_projections_template.xlsx');
    }
}
