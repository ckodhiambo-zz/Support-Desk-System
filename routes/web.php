<?php

use App\Http\Controllers\AgentTicketsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TypeController;
use App\Http\Livewire\Admin\AddUserComponent;
use App\Http\Livewire\Admin\AdminEditCompanyComponent;
use App\Http\Livewire\Admin\AdminSearchComponent;
use App\Http\Livewire\Admin\AssignedTicketsComponent;
use App\Http\Livewire\Admin\CustomRequestTicketComponent;
use App\Http\Livewire\Admin\EditTicketDetailsComponent;
use App\Http\Livewire\Admin\FromEmailTicketComponent;
use App\Http\Livewire\Admin\ListOfUsersComponent;
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
use App\Http\Livewire\Employee\IndividualTicketComponent;
use App\Http\Livewire\Employee\MyRaisedTicketDetailsComponent;
use App\Http\Livewire\Employee\MySolvedTicketsComponent;
//use App\Http\Livewire\Employee\SolvedTicketsComponent;
use App\Http\Livewire\Employee\TicketsComponent;
use App\Http\Livewire\Nabo\ExternalTicketComponent;
use App\Http\Livewire\Nabo\ListOfTicketsComponent;
use App\Http\Livewire\Nabo\NaboDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class,'welcome']);

Route::get('/home', HomeComponent::class)->name('default-user.home');

Route::get('/', [RouteController::class, 'home'])->name('home');
Route::get('/signin',[AuthController::class,'signin']);
Route::get('/callback',[AuthController::class,'callback']);

//For Demo
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/demo/dashboard', DemoDashboardComponent::class)->name('demo.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/demo/dashboard', DemoDashboardComponent::class)->name('demo.dashboard');
});


//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/companies', CompanyComponent::class)->name('home.companies');
    Route::get('/admin/dashboard/assets', AssetComponent::class)->name('home.assets');
    Route::get('/admin/dashboard/all-tickets', AdminSearchComponent::class)->name('admin.all-tickets');
    Route::get('/admin/dashboard/companies/edit/{company_id}', AdminEditCompanyComponent::class)->name('admin.edit_company');
    Route::get('/admin/dashboard/ticket-details', TicketDetailsComponent::class)->name('ticket.details');
    Route::get('/admin/dashboard/my-assigned-tickets', AssignedTicketsComponent::class)->name('ticket.assigned-tickets');
    Route::post('/admin/solver/set', [AdminDashboardComponent::class, 'setSolver'])->name('solver.set');
    Route::post('/admin/solver/set', [AdminSearchComponent::class, 'setSolver'])->name('solver.set');
    Route::get('/admin/dashboard/my-assigned-tickets/details/{ticket}', EditTicketDetailsComponent::class)->name('admin.edit-ticket');
    Route::post('/admin/dashboard/my-assigned-tickets/update/{ticket}', [TicketsController::class, 'updateStatus'])->name('admin.update-ticket');
    Route::get('/admin/dashboard/ticket-reports', TicketReportsComponent::class)->name('admin.ticket-report');
    Route::get('/admin/dashboard/custom-ticket-request', CustomRequestTicketComponent::class)->name('admin.custom-ticket-request');
    Route::post('/admin/dashboard/custom-ticket-submit', [CustomRequestTicketComponent::class, 'submitCustomTicket'])->name('admin.custom-ticket.submit');
    Route::get('/admin/dashboard/list-of-users',ListOfUsersComponent::class)->name('admin.list-of-users');
    Route::get('/admin/dashboard/add-new-user',AddUserComponent::class)->name('admin.new-user');
    Route::post('/admin/dashboard/add/user',[AddUserComponent::class, 'addUser'])->name('admin.add-new-user');
    Route::get('/admin/dashboard/tickets-from-emails',FromEmailTicketComponent::class)->name('admin.tickets-from-email');
});

// --------------------Login-with-Google-------------------------------

Route::get('auth/redirect', 'App\Http\Controllers\SocialController@redirect');
Route::get('auth/callback', 'App\Http\Controllers\SocialController@callback');

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
//    Route::get('/employee/dashboard/my-tickets/{ticket}', MyRaisedTicketDetailsComponent::class)->name('employee.ticket-details');
    Route::get('/employee/dashboard/my-solved-tickets',MySolvedTicketsComponent::class)->name('employee.my-solved-tickets');
    Route::get('/employee/dashboard/my-tickets/details/{ticket}', IndividualTicketComponent::class)->name('employee.ticket-detail');
    Route::get('/employee/dashboard/my-tickets/details/download-PDF/{ticket}',[IndividualTicketComponent::class,'downloadPDF'])->name('employee.download-pdf');

});

//For Nabo
Route::middleware(['auth:sanctum','verified','authnabo'])->group(function (){
    Route::get('/nabocapital/internal-ticket',NaboDashboardComponent::class)->name('nabostaff.dashboard');
    Route::get('/nabocapital/my-tickets',ListOfTicketsComponent::class)->name('my-nabo-tickets.dashboard');
    Route::get('/nabocapital/IT-support-ticket', ExternalTicketComponent::class)->name('nabostaff.external');
});

