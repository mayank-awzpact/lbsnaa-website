<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ManageOrganizationController;
use App\Http\Controllers\Admin\CourseController;

use App\Http\Controllers\Admin\ManageSouvenirController;


use App\Http\Controllers\Admin\TrainingManagementController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\ViewprofileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;







// Indrajeet
use App\Http\Controllers\Admin\OrganiserController;
use App\Http\Controllers\Admin\CoordinatorController;
use App\Http\Controllers\Admin\ManageVenueController;
use App\Http\Controllers\Admin\ManageFoundersController;
use App\Http\Controllers\Admin\ManageCadresController;

use App\Http\Controllers\Admin\ManageTenderController;
use App\Http\Controllers\Admin\ManageVacancyController;
use App\Http\Controllers\Admin\ManageEventsController;


use App\Http\Controllers\Admin\ManageMediaCenterController;
use App\Http\Controllers\Admin\ManageVideoController;
use App\Http\Controllers\Admin\ManageMediaCategoriesController;
use App\Http\Controllers\Admin\ManagePhotoGalleryController;
use App\Http\Controllers\Admin\ManageAuditController;

// Indrajeet



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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
Route::get('/admin', [Controller::class, 'index'])->name('admin.index');
});

Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('admin.menus.update');
Route::get('/admin/menu/{id}/delete', [MenuController::class, 'delete'])->name('admin.menus.delete');

Route::post('/admin/menus/{id}/toggle-status', [MenuController::class, 'toggleStatus'])->name('admin.menus.toggleStatus');


Route::prefix('admin')->group(function () {

    Route::get('sliders', [HomeController::class, 'slider_list'])->name('admin.slider_list');
    Route::get('sliders/create', [HomeController::class, 'slider_create'])->name('admin.slider_create');
    Route::post('sliders', [HomeController::class, 'slider_store'])->name('admin.slider_store');
    Route::get('sliders/{id}/edit', [HomeController::class, 'slider_edit'])->name('admin.slider_edit');
    Route::put('sliders/{id}', [HomeController::class, 'slider_update'])->name('admin.slider_update');
    Route::delete('sliders/{id}', [HomeController::class, 'slider_destroy'])->name('admin.slider_destroy');
    Route::post('sliders/{id}/toggle-status', [HomeController::class, 'slider_toggle_status'])->name('admin.slider_toggle_status');


    Route::get('/footer-images', [HomeController::class, 'footer_image_list'])->name('admin.footer_images.index');
    Route::get('/footer-images/create', [HomeController::class, 'footer_image_create'])->name('admin.footer_images.create');
    Route::post('/footer-images', [HomeController::class, 'footer_image_store'])->name('admin.footer_images.store');
    Route::get('/footer-images/{id}/edit', [HomeController::class, 'footer_image_edit'])->name('admin.footer_images.edit');
    Route::put('/footer-images/{id}', [HomeController::class, 'footer_image_update'])->name('admin.footer_images.update');
    Route::delete('/footer-images/{id}', [HomeController::class, 'footer_image_destroy'])->name('admin.footer_images.destroy');
    Route::put('footer-images/{id}/status', [HomeController::class, 'footer_images_status_update'])->name('admin.footer_images.status');

    Route::get('/quick-links', [HomeController::class, 'quick_link_list'])->name('admin.quick_links.index');
    Route::get('/quick-links/create', [HomeController::class, 'quick_link_create'])->name('admin.quick_links.create');
    Route::post('/quick-links/store', [HomeController::class, 'quick_link_store'])->name('admin.quick_links.store');
    Route::get('/quick-links/{id}/edit', [HomeController::class, 'quick_link_edit'])->name('admin.quick_links.edit');
    Route::put('/quick-links/{id}', [HomeController::class, 'quick_link_update'])->name('admin.quick_links.update');
    Route::delete('/quick-links/{id}', [HomeController::class, 'quick_link_destroy'])->name('admin.quick_links.destroy');
    Route::put('footer-images/{id}/status', [HomeController::class, 'quick_link_status_update'])->name('admin.quick_links.status');



    // faculty routes
    Route::get('/faculty', [ManageOrganizationController::class, 'facultyIndex'])->name('admin.faculty.index');
    Route::get('/faculty/create', [ManageOrganizationController::class, 'facultyCreate'])->name('admin.faculty.create');
    Route::post('/faculty', [ManageOrganizationController::class, 'facultyStore'])->name('admin.faculty.store');
    Route::get('/faculty/{id}/edit', [ManageOrganizationController::class, 'facultyEdit'])->name('admin.faculty.edit');
    Route::put('/faculty/{id}', [ManageOrganizationController::class, 'facultyUpdate'])->name('admin.faculty.update');
    Route::delete('/faculty/{id}', [ManageOrganizationController::class, 'facultyDestroy'])->name('admin.faculty.destroy');

    // Staff Routes
    Route::get('/staff', [ManageOrganizationController::class, 'staffIndex'])->name('admin.staff.index');
    Route::get('/staff/create', [ManageOrganizationController::class, 'staffCreate'])->name('admin.staff.create');
    Route::post('/staff', [ManageOrganizationController::class, 'staffStore'])->name('admin.staff.store');
    Route::get('/staff/{id}/edit', [ManageOrganizationController::class, 'staffEdit'])->name('admin.staff.edit');
    Route::put('/staff/{id}', [ManageOrganizationController::class, 'staffUpdate'])->name('admin.staff.update');
    Route::delete('/staff/{id}', [ManageOrganizationController::class, 'staffDestroy'])->name('admin.staff.destroy');

    Route::get('sections', [ManageOrganizationController::class, 'sectionIndex'])->name('sections.index');
    Route::get('sections/create', [ManageOrganizationController::class, 'sectionCreate'])->name('sections.create');
    Route::post('sections', [ManageOrganizationController::class, 'sectionStore'])->name('sections.store');
    Route::get('sections/{id}/edit', [ManageOrganizationController::class, 'sectionEdit'])->name('sections.edit');
    Route::put('sections/{id}', [ManageOrganizationController::class, 'sectionUpdate'])->name('sections.update');
    Route::delete('sections/{id}', [ManageOrganizationController::class, 'sectionDestroy'])->name('sections.destroy');

    Route::get('/section_category', [ManageOrganizationController::class, 'indexSectionCategory'])->name('admin.section_category.index');
    Route::get('/section_category/create', [ManageOrganizationController::class, 'createSectionCategory'])->name('admin.section_category.create');
    Route::post('/section_category/store', [ManageOrganizationController::class, 'storeSectionCategory'])->name('admin.section_category.store');
    Route::get('/section_category/{id}/edit', [ManageOrganizationController::class, 'editSectionCategory'])->name('admin.section_category.edit');
    Route::put('/section_category/{id}', [ManageOrganizationController::class, 'updateSectionCategory'])->name('admin.section_category.update');
    Route::delete('/section_category/{id}', [ManageOrganizationController::class, 'destroySectionCategory'])->name('admin.section_category.destroy');

    // Manage category route
    Route::get('category', [TrainingManagementController::class, 'categoryIndex'])->name('category.index');
    Route::get('category/create', [TrainingManagementController::class, 'categoryCreate'])->name('category.create');
    Route::post('category/store', [TrainingManagementController::class, 'categoryStore'])->name('category.store');
    Route::get('category/{id}/edit', [TrainingManagementController::class, 'categoryEdit'])->name('category.edit');
    Route::post('category/{id}/update', [TrainingManagementController::class, 'categoryUpdate'])->name('category.update');
    Route::post('category/{id}/delete', [TrainingManagementController::class, 'categoryDestroy'])->name('category.destroy');

    // Manage country route
    Route::get('country', [TrainingManagementController::class, 'countryIndex'])->name('country.index');
    Route::get('country/create', [TrainingManagementController::class, 'countryCreate'])->name('country.create');
    Route::post('country/store', [TrainingManagementController::class, 'countryStore'])->name('country.store');
    Route::get('country/{id}/edit', [TrainingManagementController::class, 'countryEdit'])->name('country.edit');
    Route::post('country/{id}/update', [TrainingManagementController::class, 'countryUpdate'])->name('country.update');
    Route::post('country/{id}/delete', [TrainingManagementController::class, 'countryDestroy'])->name('country.destroy');

    // Manage state route
    Route::get('state', [TrainingManagementController::class, 'stateIndex'])->name('state.index');
    Route::get('state/create', [TrainingManagementController::class, 'stateCreate'])->name('state.create');
    Route::post('state/store', [TrainingManagementController::class, 'stateStore'])->name('state.store');
    Route::get('state/{id}/edit', [TrainingManagementController::class, 'stateEdit'])->name('state.edit');
    Route::post('state/{id}/update', [TrainingManagementController::class, 'stateUpdate'])->name('state.update');
    Route::post('state/{id}/delete', [TrainingManagementController::class, 'stateDestroy'])->name('state.destroy');

    // Manage Districts route
    Route::get('district', [TrainingManagementController::class, 'districtIndex'])->name('district.index');
    Route::get('district/create', [TrainingManagementController::class, 'districtCreate'])->name('district.create');
    Route::post('district/store', [TrainingManagementController::class, 'districtStore'])->name('district.store');
    Route::get('district/{id}/edit', [TrainingManagementController::class, 'districtEdit'])->name('district.edit');
    Route::post('district/{id}/update', [TrainingManagementController::class, 'districtUpdate'])->name('district.update');
    Route::post('district/{id}/delete', [TrainingManagementController::class, 'districtDestroy'])->name('district.destroy');

    // Manage Exam route
    Route::get('exam', [TrainingManagementController::class, 'examIndex'])->name('exam.index');
    Route::get('exam/create', [TrainingManagementController::class, 'examCreate'])->name('exam.create');
    Route::post('exam/store', [TrainingManagementController::class, 'examStore'])->name('exam.store');
    Route::get('exam/{id}/edit', [TrainingManagementController::class, 'examEdit'])->name('exam.edit');
    Route::post('exam/{id}/update', [TrainingManagementController::class, 'examUpdate'])->name('exam.update');
    Route::post('exam/{id}/delete', [TrainingManagementController::class, 'examDestroy'])->name('exam.destroy');

    // Manage Exam route
    Route::get('survey', [SurveyController::class, 'surveyIndex'])->name('survey.index');
    Route::get('survey/create', [SurveyController::class, 'surveyCreate'])->name('survey.create');
    Route::post('survey/store', [SurveyController::class, 'surveyStore'])->name('survey.store');
    Route::get('survey/{id}/edit', [SurveyController::class, 'surveyEdit'])->name('survey.edit');
    Route::post('survey/{id}/update', [SurveyController::class, 'surveyUpdate'])->name('survey.update');
    Route::post('survey/{id}/delete', [SurveyController::class, 'surveyDestroy'])->name('survey.destroy');

    // Manage Social media route
    Route::get('socialmedia', [SocialmediaController::class, 'SocialmediaIndex'])->name('socialmedia.index');
    Route::post('socialmedia/store', [SocialmediaController::class, 'SocialmediaStore'])->name('socialmedia.store');

    Route::get('souvenir', [ManageSouvenirController::class, 'index'])->name('souvenir.index'); // List all categories
    Route::get('souvenir/create', [ManageSouvenirController::class, 'create'])->name('souvenir.create'); // Show create form
    Route::post('souvenir', [ManageSouvenirController::class, 'store'])->name('souvenir.store'); // Store new category
    Route::get('souvenir/{id}/edit', [ManageSouvenirController::class, 'edit'])->name('souvenir.edit'); // Show edit form
    Route::put('souvenir/{id}', [ManageSouvenirController::class, 'update'])->name('souvenir.update'); // Update existing category
    Route::delete('souvenir/{id}', [ManageSouvenirController::class, 'destroy'])->name('souvenir.destroy'); // Delete category


    Route::get('/academy-souvenirs', [ManageSouvenirController::class, 'indexAcademySouvenirs'])->name('academy_souvenirs.index');
    Route::get('/academy-souvenirs/create', [ManageSouvenirController::class, 'createAcademySouvenir'])->name('academy_souvenirs.create');
    Route::post('/academy-souvenirs/store', [ManageSouvenirController::class, 'storeAcademySouvenir'])->name('academy_souvenirs.store');
    Route::get('/academy-souvenirs/edit/{id}', [ManageSouvenirController::class, 'editAcademySouvenir'])->name('academy_souvenirs.edit');
    Route::PUT('/academy-souvenirs/update/{id}', [ManageSouvenirController::class, 'updateAcademySouvenir'])->name('academy_souvenirs.update');
    Route::delete('/academy-souvenirs/destroy/{id}', [ManageSouvenirController::class, 'destroyAcademySouvenir'])->name('academy_souvenirs.destroy');

    //view profile route
    Route::get('view-profile', [ViewprofileController::class, 'index'])->name('view-profile.index');

    //change password
    Route::get('change_password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change_password');
    Route::post('change-password', [ChangePasswordController::class, 'updatePassword'])->name('update_password');


    //change souvenirs
    Route::get('/academy-souvenirs', [ManageSouvenirController::class, 'indexAcademySouvenirs'])->name('academy_souvenirs.index');
    Route::get('/academy-souvenirs/create', [ManageSouvenirController::class, 'createAcademySouvenir'])->name('academy_souvenirs.create');
    Route::post('/academy-souvenirs/store', [ManageSouvenirController::class, 'storeAcademySouvenir'])->name('academy_souvenirs.store');
    Route::get('/academy-souvenirs/edit/{id}', [ManageSouvenirController::class, 'editAcademySouvenir'])->name('academy_souvenirs.edit');
    Route::PUT('/academy-souvenirs/update/{id}', [ManageSouvenirController::class, 'updateAcademySouvenir'])->name('academy_souvenirs.update');
    Route::delete('/academy-souvenirs/destroy/{id}', [ManageSouvenirController::class, 'destroyAcademySouvenir'])->name('academy_souvenirs.destroy');

    // Indrajeet
    Route::resource('organisers', OrganiserController::class);
    Route::resource('venues', ManageVenueController::class);
    Route::resource('coordinators', CoordinatorController::class);
    Route::resource('founders', ManageFoundersController::class);
    Route::resource('cadres', ManageCadresController::class);
    Route::resource('manage_tender', ManageTenderController::class);
    Route::resource('manage_vacancy', ManageVacancyController::class);
    Route::get('/manage_vacancy/{id}/edit', [ManageVacancyController::class, 'edit'])->name('manage_vacancy.edit');
    Route::resource('manage_events', ManageEventsController::class);
    Route::get('/manage_events/{id}/edit', [ManageEventsController::class, 'edit'])->name('manage_events.edit');
    Route::put('/manage_events/{id}', [ManageEventsController::class, 'update'])->name('manage_events.update');
    Route::resource('media-center', ManageMediaCenterController::class);
    Route::resource('video_gallery', ManageVideoController::class);
    Route::resource('media-categories', ManageMediaCategoriesController::class);
    Route::resource('photo-gallery', ManagePhotoGalleryController::class);
    Route::get('search-courses', [ManageEventsController::class, 'searchCourses'])->name('search.courses');
    // In routes/web.php
    Route::get('/admin/get-course-details/{courseId}', [CourseController::class, 'getCourseDetails']);

    // Indrajeet



    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('news', NewsController::class);
        // Route::resource('faculty', FacultyMemberController::class);
    });


    // Indrajeet
    Route::resource('organisers', OrganiserController::class);
    Route::resource('coordinators', CoordinatorController::class);
    Route::resource('venues', ManageVenueController::class);
    Route::resource('founders', ManageFoundersController::class);
    Route::resource('cadres', ManageCadresController::class);

    Route::resource('manage_tender', ManageTenderController::class);
    Route::resource('manage_vacancy', ManageVacancyController::class);
    Route::get('/manage_vacancy/{id}/edit', [ManageVacancyController::class, 'edit'])->name('manage_vacancy.edit');
    Route::resource('manage_events', ManageEventsController::class);

    Route::get('/manage_events/{id}/edit', [ManageEventsController::class, 'edit'])->name('manage_events.edit');
    Route::put('/manage_events/{id}', [ManageEventsController::class, 'update'])->name('manage_events.update');
    Route::get('/manage-audit', [ManageAuditController::class, 'index'])->name('manage_audit.index');

});
// Indrajeet


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseController::class);


    // Route::prefix('admin')->name('admin.')->group(function() {
    //     Route::resource('news', NewsController::class);
    //     // Route::resource('faculty', FacultyMemberController::class);
    // });

});


// login wrok here mayank
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
