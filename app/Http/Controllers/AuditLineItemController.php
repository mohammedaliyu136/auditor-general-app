<?php

namespace App\Http\Controllers;

use App\Models\AuditLineItem;
use Illuminate\Http\Request;

class AuditLineItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditLineItems = AuditLineItem::paginate(10);
        return view('audit.audit_line_items.index', compact('auditLineItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('audit.audit_line_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'line_item_code' => 'required|string|max:100|unique:audit_line_items,line_item_code',
            'line_item_description' => 'required|string|max:255',
        ]);

        AuditLineItem::create($validated);

        return redirect()->route('audit-line-items.index')->with('success', 'Audit Line Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditLineItem $auditLineItem)
    {
        return view('audit.audit_line_items.show', compact('auditLineItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditLineItem $auditLineItem)
    {
        return view('audit.audit_line_items.edit', compact('auditLineItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditLineItem $auditLineItem)
    {
        $validated = $request->validate([
            'line_item_code' => 'required|string|max:100|unique:audit_line_items,line_item_code,' . $auditLineItem->id,
            'line_item_description' => 'required|string|max:255',
        ]);

        $auditLineItem->update($validated);

        return redirect()->route('audit-line-items.index')->with('success', 'Audit Line Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditLineItem $auditLineItem)
    {
        $auditLineItem->delete();

        return redirect()->route('audit-line-items.index')->with('success', 'Audit Line Item deleted successfully.');
    }
}
