<?php

namespace App\Http\Controllers;

use App\Models\AuditData;
use App\Models\BudgetData;
use App\Models\DsaData;
use App\Models\MtbMacroAssumption;
use App\Models\MtbRevenueProjection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with key metrics.
     */
    public function index()
    {
        $stats = [
            'budget' => [
                'count' => BudgetData::count(),
                'total_amount' => BudgetData::sum('amount'), // Assuming 'amount' column exists
            ],
            'audit' => [
                'count' => AuditData::count(),
                'total_amount' => AuditData::sum('amount'), // Assuming 'amount' column exists
            ],
            'dsa' => [
                'count' => DsaData::count(),
            ],
            'mtb' => [
                'macro_count' => MtbMacroAssumption::count(),
                'revenue_count' => MtbRevenueProjection::count(),
                'total_revenue' => MtbRevenueProjection::sum('projected_amount'),
            ],
        ];

        return view('dashboard', compact('stats'));
    }
}
