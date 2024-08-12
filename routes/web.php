<?php

use App\Http\Controllers\AppointController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\vaccineController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/app-download', function () {
    $filePath = public_path('app.apk');
    return response()->download($filePath, 'app.apk');
})->name('app.download');

Route::middleware('auth')->group(function () {
    Route::get('/profile-index', [ProfileController::class, 'profileIndex'])->name('profile.index');
    Route::get('/profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings');
    Route::post('/profile-update/image', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
});

/**-------------------------------------------------------------------------
 * KEY : PATIENT REGISTATION PART
 * -------------------------------------------------------------------------
 */

Route::get('/patient/info-general', [PatientController::class, 'generalProfile'])->name('info-general');
Route::post('/patient-registry/store', [PatientController::class, 'patientRegistry'])->name('patient-registry.store');

Route::group(['middleware' => ['auth', 'verified']], function() {

    Route::post('/sensitive-information', [PatientController::class, 'sensitiveInformation'])->name('sensitive-information.store');
    Route::post('/genetic-disease-profile', [PatientController::class, 'geneticDiseaseProfile'])->name('genetic-disease-profile.store');
    Route::post('/other-personal-information', [PatientController::class, 'otherPersonalInformation'])->name('personal-information.store');
    
    Route::get('/patient/info-cases/list', [PatientController::class, 'casesList'])->name('info-cases-list');
    Route::get('/patient/info-cases/from', [PatientController::class, 'casesFrom'])->name('info-cases-from');
    Route::get('/patient/info-cases/{id}/edit', [PatientController::class, 'casesEdit'])->name('info-cases.edit');
    Route::post('/cases/case-registry/store', [PatientController::class, 'caseRegistry'])->name('case_registry.store');
    Route::post('/cases/treatment-lab-test/store', [PatientController::class, 'treatmentLabTest'])->name('treatment-lab-test.store');
    Route::post('/cases/medication-schedule/store', [PatientController::class, 'medicationSchedule'])->name('medication-schedule.store');
    Route::post('/cases/surgical-intervention/store', [PatientController::class, 'surgicalIntervention'])->name('surgical-intervention.store');
    Route::post('/cases/optional-questions/store', [PatientController::class, 'optionsalQuestion'])->name('optional-questions.store');
    Route::post('/cases/restriction/store', [PatientController::class, 'restriction'])->name('restriction.store');

    Route::get('/treatment-prescription/{id}/dwonload', [PatientController::class, 'downloadPrescription'])->name('treatment-prescription.dwonload');
    Route::get('/treatment-labtest/{id}/dwonload', [PatientController::class, 'downloadLabtest'])->name('treatment-labtest.dwonload');
    
    Route::get('/patient/info-profiling-tool', [PatientController::class, 'profilingTool'])->name('info-profiling-tool');
    Route::post('/blood-sugar-profiling/store', [PatientController::class, 'bloodSugarProfiling'])->name('blood-sugar-profiling.store');
    Route::post('/blood-pressure-profiling/store', [PatientController::class, 'bloodPressureProfiling'])->name('blood-pressure-profiling.store');


    Route::get('/patient/info-vaccination-record', [PatientController::class, 'vaccinationRecord'])->name('info-vaccination-record');
    Route::post('/vaccinations/store', [PatientController::class, 'vaccinationStore'])->name('vaccinations.store');
    Route::get('/download/vaccination/{id}/file', [PatientController::class, 'vaccinationDownload'])->name('vaccination.download');
    
    Route::post('/covid-vaccine/store', [PatientController::class, 'vaccinationCovid'])->name('covid-vaccine.store');
    Route::post('/covid-certificate/store', [PatientController::class, 'covidCertificate'])->name('covid-certificate.upload');
    Route::get('/covid_file_download', [PatientController::class, 'covidFileDownload'])->name('covid_file_download');
    

    Route::get('/patient/info-random-uploader', [PatientController::class, 'randomUploaderTool'])->name('info-random-uploader');
    Route::post('/patient/random-uploader-tool/store', [PatientController::class, 'saveRandomUploaderTool'])->name('random-uploader-tool.store');
    Route::get('/download/random-uploader/{id}/tool', [PatientController::class, 'downloadRandomUploaderTool'])->name('random-uploader-tool.download');
    

    Route::get('/patient/info-doctor-appointment', [PatientController::class, 'doctorAppointMent'])->name('info-doctor-appointment');
    Route::post('/patient/info-doctor-appointment/store', [PatientController::class, 'saveDoctorAppointment'])->name('info-doctor-appointment.store');
    Route::get('/patient/info-doctor-appointment/edit', [PatientController::class, 'editDoctorAppointment'])->name('info-doctor-appointment.edit');

});

/**-------------------------------------------------------------------------
 * KEY : REPORT PART
 * -------------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/report-patient/user/list', [ReportController::class, 'reportUserIndex'])->name('report-user.index'); // First-Page
    Route::get('/report-patient/admin/list', [ReportController::class, 'reportAdminIndex'])->name('report-admin.index'); //Next-use
    
    Route::get('/report/{id}/complete-profile-download', [ReportController::class, 'completeProfile'])->name('complete-profile.report'); // Report => 1
    Route::get('/report/{id}/doctor-visit-download', [ReportController::class, 'doctorVisit'])->name('doctor-visit.report'); // Report => 3
    Route::get('/report/{id}/medicine-list-download', [ReportController::class, 'medicineDownload'])->name('medicine-list.report'); // Report => 4
    Route::get('/report/{id}/antibiotic-download', [ReportController::class, 'antibioticDownload'])->name('antibiotic-cost.report'); // Report => 5
    Route::get('/report/{id}/test-done-download', [ReportController::class, 'testDownload'])->name('test-done.report'); // Report => 6
    Route::get('/report/{id}/doctor-cost-download', [ReportController::class, 'doctorCost'])->name('doctor-cost.report'); // Report => 7
    Route::get('/report/{id}/pathological-download', [ReportController::class, 'pathoLogical'])->name('pathological.report'); // Report => 8
    Route::get('/report/{id}/cost-medicines-consumed-download', [ReportController::class, 'costMedicinesConsumed'])->name('cost-medicines-consumed.report'); // Report => 9
    Route::get('/report/{id}/cost-surgical-medicine', [ReportController::class, 'costSurgicalMedicine'])->name('cost-surgical-medicine.report'); // Report => 10
    

    /**-------------------------------------------------------------------------
    * Report Minhaz Continue
    * -------------------------------------------------------------------------
    */
    Route::get('/report/cost-per-year-download',[ReportController::class, 'totalCost'])->name('cost-per-year.report'); // Report => 11
    Route::get('/report/cost-per-month-download',[ReportController::class, 'perMonth'])->name('cost-per-month.report'); // Report => 12
    Route::get('/report/{id}/years-record-download', [ReportController::class, 'yearsRecord'])->name('years-record.report'); // Report => 14, 15, 16
    Route::get('/report/vaccination-record-download',[ReportController::class, 'vaccinationRecord'])->name('vaccination-record.report'); // Report => 17

});




require __DIR__.'/auth.php';
