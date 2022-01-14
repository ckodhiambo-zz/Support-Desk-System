<?php

use App\Http\Controllers\AgentTicketsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TypeController;
use App\Http\Livewire\Admin\AdminEditCompanyComponent;
use App\Http\Livewire\Admin\AssignedTicketsComponent;
use App\Http\Livewire\Admin\EditTicketDetailsComponent;
use App\Http\Livewire\Admin\TicketDetailsComponent;
use App\Http\Livewire\Admin\TicketReportsComponent;
use App\Http\Livewire\Agent\AgentAssignedTicketsComponent;
use App\Http\Livewire\Agent\AgentDashboardComponent;
use App\Http\Livewire\Agent\AgentEditTicketDetailsComponent;
use App\Http\Livewire\Agent\AgentTicketReportsComponent;
use App\Http\Livewire\AssetComponent;
use App\Http\Livewire\CompanyComponent;
use App\Http\Livewire\Demo\DemoDashboardComponent;
use App\Http\Livewire\Employee\EmployeeDashboardComponent;
use App\Http\Livewire\Employee\TicketsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', HomeComponent::class)->name('home');


//For Demo
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/demo/dashboard', DemoDashboardComponent::class)->name('demo.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/companies', CompanyComponent::class)->name('home.companies');
    Route::get('/admin/dashboard/assets', AssetComponent::class)->name('home.assets');
    Route::get('/admin/dashboard/companies/edit/{company_id}', AdminEditCompanyComponent::class)->name('admin.edit_company');
    Route::get('/admin/dashboard/ticket-details', TicketDetailsComponent::class)->name('ticket.details');
    Route::get('/admin/dashboard/my-assigned-tickets', AssignedTicketsComponent::class)->name('ticket.assigned-tickets');
    Route::post('/admin/solver/set', [AdminDashboardComponent::class, 'setSolver'])->name('solver.set');
    Route::get('/admin/dashboard/my-assigned-tickets/details/{ticket}', EditTicketDetailsComponent::class)->name('admin.edit-ticket');
    Route::post('/admin/dashboard/my-assigned-tickets/update/{ticket}', [TicketsController::class, 'updateStatus'])->name('admin.update-ticket');
    Route::get('/admin/dashboard/ticket-reports', TicketReportsComponent::class)->name('admin.ticket-report');
});

//For Agent
Route::middleware(['auth:sanctum', 'verified', 'authagent'])->group(function () {
    Route::get('/agent/dashboard/my-assigned-tickets', AgentAssignedTicketsComponent::class)->name('ticket.agent-assigned-tickets');
    Route::get('/agent/dashboard/my-assigned-tickets/details/{ticket}', AgentEditTicketDetailsComponent::class)->name('agent.edit-ticket');
    Route::post('/agent/dashboard/my-assigned-tickets/update/{ticket}', [AgentTicketsController::class, 'updateStatus'])->name('agent.update-ticket');
    Route::get('/agent/dashboard/ticket-reports', AgentTicketReportsComponent::class)->name('agent.ticket-report');
});

//For Employee
Route::middleware(['auth:sanctum', 'verified', 'defaultauth'])->group(function () {
    Route::get('/employee/dashboard', EmployeeDashboardComponent::class)->name('employee.dashboard');
    Route::get('/employee/dashboard/my-tickets', TicketsComponent::class)->name('employee.my-tickets');
    Route::post('/employee/ticket/submit', [EmployeeDashboardComponent::class, 'submitTicket'])->name('employee.ticket.submit');

});


