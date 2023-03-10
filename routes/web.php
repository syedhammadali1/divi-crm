<?php

use App\Http\Controllers\AssigneeBrandTargetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandTargetsController;
use App\Http\Controllers\LeadFormController;
use App\Http\Controllers\MyStickyNoteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SourceAccountController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskCommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/employee-registration', [RegistrationController::class, 'index'])->name('employee_registration');
Route::post('/employee-registration-submit', [RegistrationController::class, 'registration_submit'])->name('registration_submit');


Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);

Route::get('hash/{key}', function ($key) {
    return Hash::make($key);
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // PusherNotification

    Route::get('/sent-pnotify', [ProjectController::class, 'sentPNotify'])->name('sentPNotify');
    Route::get('/receive-pnotify', function (){
        return view('receive-pnotify');
    });

    Route::get('/steps', [HomeController::class, 'steps'])->name('steps');
    Route::get('/switch-project/{id}', [HomeController::class, 'switch_project'])->name('switch_project');

    Route::get('/user-profile', [HomeController::class, 'user_profile'])->name('user_profile');
    Route::post('/user-info-update', [HomeController::class, 'user_infoupdate'])->name('user_infoupdate');
    Route::get('/user-office-details', [HomeController::class, 'user_office_details'])->name('user_office_details');
    Route::post('/user-office-info-update', [HomeController::class, 'user_office_infoupdate'])->name('user_office_infoupdate');
    Route::post('/user-file-info-update', [HomeController::class, 'user_file_infoupdate'])->name('user_file_infoupdate');
    Route::get('/user-file-details', [HomeController::class, 'user_file_details'])->name('user_file_details');
    Route::post('/user-photo-update', [HomeController::class, 'upload_image'])->name('upload_image');
    Route::post('/profile-submit', [HomeController::class, 'profile_submit'])->name('profile_submit');
    Route::get('/user-rights', [HomeController::class, 'user_rights'])->name('user_rights');
    // Report Routes
    Route::post('/user-updates', [HomeController::class, 'user_updates'])->name('user_updates');
    Route::post('/shift-change', [HomeController::class, 'shift_change'])->name('shift_change');

    Route::get('/registered-user-report', [ReportController::class, 'registered_user_report'])->name('registered_user_report');
    Route::get('/all-user-report/{slug?}', [ReportController::class, 'all_registered_user_report'])->name('all_registered_user_report');


    Route::get('/attendance-sheet-import', [ReportController::class, 'attendance_sheet_import'])->name('attendance_sheet_import');
    Route::post('attendance-import-submit', [ReportController::class, 'attendance_import_submit'])->name('attendance_import_submit');

    // Report Routes End


//    Route::get('/attributess', [GenericController::class , 'roless'])->name('roless');
    Route::get('/attribute/{slug}', [GenericController::class, 'listing'])->name('listing');
    Route::get('/report/{slug}', [GenericController::class, 'report_user'])->name('report_user');
    Route::post('/custom-report', [GenericController::class, 'custom_report'])->name('custom_report');
    Route::get('/custom-report/{slug}/{slug2}', [GenericController::class, 'custom_report_user'])->name('custom_report_user');
    Route::post('/generic-submit', [GenericController::class, 'generic_submit'])->name('generic_submit');
    Route::post('/assign-role-submit', [GenericController::class, 'roleassign_submit'])->name('roleassign_submit');
    Route::post('/role-assign-modal', [GenericController::class, 'role_assign_modal'])->name('role_assign_modal');

    // Payroll Routes
    Route::get('/payroller', [PayrollController::class, 'payroller'])->name('payroller');

    Route::post('/payroll-month-report', [PayrollController::class, 'payroll_month_report'])->name('payroll_month_report');
    // Payroll Routes End

    // Chat Room
    Route::get('chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('save-msg', [ChatController::class, 'save_msg'])->name('save_msg');
    Route::post('fetch-msg', [ChatController::class, 'fetch_msg'])->name('fetch_msg');

    // Task Comment
    Route::post('save-task-comment-msg', [TaskCommentController::class, 'save_comment_msg'])->name('save_comment_msg');
    Route::post('fetch-task-comment-msg', [TaskCommentController::class, 'fetch_comment_msg'])->name('fetch_comment_msg');

    // Project brands
    Route::get('view-brand-project', [ProjectController::class, 'projectBrandList'])->name('viewbrandproject');
    Route::get('view-brand-source-account-project/{id}', [ProjectController::class, 'viewBrandSourceAccountProject'])->name('viewBrandSourceAccountProject.id');
    Route::get('view-brand-project/{id}', [ProjectController::class, 'viewproject'])->name('viewbrandproject.id');
    Route::get('view-project-categories/{brandid}/{sourceId?}', [ProjectController::class, 'viewProjectCategories'])->name('viewProjectCategories.brandid');
    Route::get('view-category-projects/{brandid}/{cateid}/{sourceId?}', [ProjectController::class, 'viewCategoryProjects'])->name('viewCategoryProjects.brandid.cateid');

    Route::get('view-project-create', [ProjectController::class, 'viewProjectCreate'])->name('viewProjectCreate');

    Route::get('all-projects-view', [ProjectController::class , 'allProjectsView'])->name('allProjectsView');
    // Source Account

    Route::resource('source-account', SourceAccountController::class);

    // Project Details
    Route::get('project-detail/{id}', [ProjectController::class, 'projectDetailById'])->name('projectdetail.id');

    // Project Task Attachments Download
    Route::get('project-taskAttachment/{id}', [ProjectController::class, 'projectTaskAttachments'])->name('projecttaskattachments.id');

    Route::get('project-attachment/{id}', [ProjectController::class, 'projectAttachments'])->name('projectattachments.id');
    Route::post('react/project-final-file-status',[ProjectController::class, 'projectFinalFileStatus'])->name('react-project-final-file-status');
    Route::post('content/final-file',[ProjectController::class, 'upLoadProjectFinalFile'])->name('content.upLoad-project-final-file');
    // Project and Task
//    Route::get('view-project', [ProjectController::class , 'viewproject'])->name('viewproject'); //

    Route::get('create-project', [ProjectController::class, 'createproject'])->name('createproject');
    Route::post('project-submit', [ProjectController::class, 'project_submit'])->name('project_submit');

    Route::get('create-project-form/{projtype}', [ProjectController::class, 'createProjectForm'])->name('createProjectForm.projtype');
    Route::post('get-source-account-emp', [ProjectController::class, 'getSourceAccountEmp'])->name('getSourceAccountEmp');

    // Create Development Project
    Route::post('content-project-submit', [ProjectController::class, 'content_project_submit'])->name('content_project_submit');
    Route::post('development-project-submit', [ProjectController::class, 'development_project_submit'])->name('development_project_submit');
    Route::post('seo-project-submit', [ProjectController::class, 'seo_project_submit'])->name('seo_project_submit');
    Route::post('design-project-submit', [ProjectController::class, 'design_project_submit'])->name('design_project_submit');
    Route::post('other-project-submit', [ProjectController::class, 'other_project_submit'])->name('other_project_submit');

    // Assigne Project
    Route::get('assignee-project/{id}', [ProjectController::class, 'assigneeProject'])->name('assigneeProject.projectId');
    Route::post('submit-assignee-project', [ProjectController::class, 'submitAssigneeProject'])->name('submitAssigneeProject');


    Route::post('project-attachment-submit', [ProjectController::class, 'project_attachment'])->name('project_attachment');
    Route::get('project-scope/{id}', [ProjectController::class, 'projectscope'])->name('projectscope');

    Route::get('project-task/{id}', [ProjectController::class, 'projecttask'])->name('projecttask');
    Route::get('create-task/{id}', [ProjectController::class, 'createtask'])->name('createtask');
    Route::get('edit-task/{id}', [ProjectController::class, 'editTask'])->name('edittask');
    Route::post('get-employees', [ProjectController::class, 'get_emp'])->name('get_emp');
    Route::post('project-task-submit', [ProjectController::class, 'projecttask_submit'])->name('projecttask_submit');
    Route::post('project-task-update', [ProjectController::class, 'projectTaskUpdate'])->name('projecttask_update');
    Route::post('task-modal-form-submit', [ProjectController::class, 'task_form_submit'])->name('task_form_submit');

    Route::delete('project-delete/{id}', [ProjectController::class, 'projectDelete'])->name('projectdelete');

    Route::get('project-transition-history/{id}', [ProjectController::class, 'projectTransitionHistoryById'])->name('projecttransitionhistory.id');
    Route::get('create-project-transition-history/{id}', [ProjectController::class, 'createProjectTransitionHistory'])->name('createprojecttransitionhistory.id');
    Route::post('submit-project-transition-history', [ProjectController::class, 'submitProjectTransitionHistory'])->name('submitprojecttransitionhistory');
    Route::post('search-projects-tasks', [ProjectController::class, 'searchProjectsAndTasks'])->name('searchprojectsandtasks');
    Route::post('get-project-task-progress', [ProjectController::class, 'getProjectTaskProgress'])->name('getprojecttaskprogress');
    Route::post('submit-project-task-progress-chat', [ProjectController::class, 'submitProjectTaskProgressChat'])->name('submitprojecttaskprogresschat');
    Route::post('submit-project-review', [ProjectController::class, 'submitProjectReview'])->name('submitprojectreview');

    Route::post('submit-project-task-bar', [ProjectController::class, 'projTaskBar'])->name('submitprojecttaskbar');

    Route::get('my-tasks', [ProjectController::class, 'myTaskslist'])->name('myTaskslist');
    // project chat format
    Route::get('project-chat/{id}', [ProjectController::class, 'projectChat'])->name('projectChat');

    // Create thread
    Route::post('create-project-thread', [ProjectController::class, 'create_project_thread'])->name('create_project_thread');

    // notification read
    Route::post('read-notifications', [ProjectController::class, 'readnotifications'])->name('readnotifications');

    //update Project and task status
    Route::get('project-and-task-status-update/{id}/{ptid}', [ProjectController::class, 'projectAndTaskStatusUpdate'])->name('projectAndTaskStatusUpdate');

    // Project Review
    Route::get('project-review/{id}', [ProjectController::class, 'projectReview'])->name('projectreview.id');

    //Client Task Profile

    Route::get('client-profile/{id}', [ClientController::class, 'client_task_profile'])->name('client_task_profile');
    Route::get('sales-profile/{id}', [ClientController::class, 'support_task_profile'])->name('support_task_profile');
    Route::post('update-client-profile', [ClientController::class, 'update_client_profile'])->name('update_client_profile');
    Route::post('update-client-password', [ClientController::class, 'update_client_password'])->name('update_client_password');

    Route::get('all-Clients', [ClientController::class, 'index'])->name('all_clients');
    Route::get('client-by-email', [ClientController::class, 'findClientByEmail'])->name('clientbyemail');
    Route::get('create-clients', [ClientController::class, 'create'])->name('createclient');
    Route::post('submit-clients', [ClientController::class, 'store'])->name('submitclient');

    // For Users
    Route::resource('tsc-user', UserController::class);
    Route::get('assignee-under-employee/{id}', [UserController::class, 'assigneeUnderEmp'])->name('assigneeUnderEmp.id');
    Route::get('user-active-inactive', [UserController::class, 'userActiveInActive'])->name('userActiveInActive');
    Route::get('check-available-empId', [UserController::class, 'checkAvailableEmpId'])->name('checkAvailableEmpId');

    Route::resource('role', RoleController::class);
    Route::get('role/permissions/{id}', [RoleController::class, 'permission'])->name('role.permission');
    Route::post('role/permissions', [RoleController::class, 'savePermissions'])->name('save.role.permission');

    Route::get('createPermissions', [RoleController::class, 'createPermissions'])->name('createPermissions');
    Route::post('submitPermissions', [RoleController::class, 'submitPermissions'])->name('submitPermissions');

    Route::resource('my-sticky-note', MyStickyNoteController::class);

    // Brands
    Route::resource('brand', BrandController::class);
    Route::get('assignee-brand/{id}', [BrandController::class, 'assigneeBrand'])->name('assigneeBrand.employee');
    Route::post('submit-assignee-brand', [BrandController::class, 'submitAssigneeBrand'])->name('submitAssigneeBrand');

    Route::get('assignee-source-account/{id}', [BrandController::class, 'assigneeSourceAccount'])->name('assigneeSourceAccount.id');
    Route::post('submit-assignee-source-account', [BrandController::class, 'submitAssigneeSourceAccount'])->name('submitAssigneeSourceAccount');

    // Brands Targets

    Route::resource('brand-target', BrandTargetsController::class);

    Route::post('brand-managers-brands', [BrandTargetsController::class, 'getBrandManagersBrands'])->name('getBrandManagersBrands');
    Route::get('brand-targets-by-brand/{id}', [BrandTargetsController::class, 'getBrandTargetsByBrandId'])->name('getBrandTargetsByBrand.id');

    // Assignee Brands Targets

    Route::resource('assignee-brand-target', AssigneeBrandTargetController::class);
    Route::get('show-assignee-brand-target/{id}/{brandid}', [AssigneeBrandTargetController::class, 'showabt'])->name('showabt.id.brandid');

    Route::resource('lead-form', LeadFormController::class);
    Route::PUT('LeadForm-Feed-Back-Message', [LeadFormController::class, 'LeadFormFeedBackMessage'])->name('LeadFormFeedBackMessage');

});
Route::post('lead-form-get', [LeadFormController::class, 'leadFormGet'])->name('leadformget');




