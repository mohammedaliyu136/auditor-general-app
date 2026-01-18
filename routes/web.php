<?php

use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');

    // Auditor General Routes
    Route::get('audit-data/import', [App\Http\Controllers\AuditDataController::class, 'showImportForm'])->name('audit-data.import-form');
    Route::get('audit-data/import/sample', [App\Http\Controllers\AuditDataController::class, 'downloadSample'])->name('audit-data.download-sample');
    Route::post('audit-data/import', [App\Http\Controllers\AuditDataController::class, 'import'])->name('audit-data.import');
    Route::resource('audit-data', App\Http\Controllers\AuditDataController::class);
    Route::resource('audit-line-items', App\Http\Controllers\AuditLineItemController::class);

    // DSA Routes
    Route::get('dsa-data/import', [App\Http\Controllers\DsaDataController::class, 'showImportForm'])->name('dsa-data.import-form');
    Route::get('dsa-data/import/sample', [App\Http\Controllers\DsaDataController::class, 'downloadSample'])->name('dsa-data.download-sample');
    Route::post('dsa-data/import', [App\Http\Controllers\DsaDataController::class, 'import'])->name('dsa-data.import');
    Route::resource('dsa-data', App\Http\Controllers\DsaDataController::class);
    Route::resource('dsa-variables', App\Http\Controllers\DsaVariableController::class);

    // Budget Routes
    Route::get('budget-data/import', [App\Http\Controllers\BudgetDataController::class, 'showImportForm'])->name('budget-data.import-form');
    Route::get('budget-data/import/sample', [App\Http\Controllers\BudgetDataController::class, 'downloadSample'])->name('budget-data.download-sample');
    Route::post('budget-data/import', [App\Http\Controllers\BudgetDataController::class, 'import'])->name('budget-data.import');
    Route::resource('budget-data', App\Http\Controllers\BudgetDataController::class);
    Route::resource('economic-codes', App\Http\Controllers\EconomicCodeController::class);
    Route::resource('subprogramme-codes', App\Http\Controllers\SubprogrammeCodeController::class);

    // MTB Routes
    Route::get('macro-assumptions/import', [App\Http\Controllers\MtbMacroAssumptionController::class, 'showImportForm'])->name('macro-assumptions.import-form');
    Route::get('macro-assumptions/import/sample', [App\Http\Controllers\MtbMacroAssumptionController::class, 'downloadSample'])->name('macro-assumptions.download-sample');
    Route::post('macro-assumptions/import', [App\Http\Controllers\MtbMacroAssumptionController::class, 'import'])->name('macro-assumptions.import');
    Route::resource('macro-assumptions', App\Http\Controllers\MtbMacroAssumptionController::class);

    Route::get('revenue-projections/import', [App\Http\Controllers\MtbRevenueProjectionController::class, 'showImportForm'])->name('revenue-projections.import-form');
    Route::get('revenue-projections/import/sample', [App\Http\Controllers\MtbRevenueProjectionController::class, 'downloadSample'])->name('revenue-projections.download-sample');
    Route::post('revenue-projections/import', [App\Http\Controllers\MtbRevenueProjectionController::class, 'import'])->name('revenue-projections.import');
    Route::resource('revenue-projections', App\Http\Controllers\MtbRevenueProjectionController::class);

    // System Routes
    Route::resource('data-import-logs', App\Http\Controllers\DataImportLogController::class)->only(['index', 'show']);
    // General Settings
    Route::get('settings/general', [App\Http\Controllers\Settings\GeneralController::class, 'edit'])->name('settings.general.edit');
    Route::put('settings/general', [App\Http\Controllers\Settings\GeneralController::class, 'update'])->name('settings.general.update');
});

require __DIR__.'/auth.php';
