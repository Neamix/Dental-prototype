<?php

use App\Http\Controllers\AppoimentsController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TestController;
use App\Models\Appoiment;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');




Route::group(['middleware' => 'auth'],function(){
    Route::group(['prefix' => '/schedule'],function(){
        Route::get('/',[ScheduleController::class,'index'])->name('schedule');
        Route::post('/upsertInstance',[ScheduleController::class,'upsertInstance'])->name('schedule.upsert');
        Route::get('/create',[ScheduleController::class,'create'])->name('schedule.create');
        Route::get('/edit/{schedule}',[ScheduleController::class,'edit'])->name('schedule.edit');
        Route::post('/delete/{schedule}',[ScheduleController::class,'delete'])->name('schedule.delete');
    });

    Route::group(['prefix' => '/'],function() {
        Route::get('/',[PatientController::class,'index'])->name('patient');
        Route::post('/upsertInstance',[PatientController::class,'upsertInstance'])->name('patient.upsert');
        Route::get('/create',[PatientController::class,'create'])->name('patient.create');
        Route::get('/edit/{patient}',[PatientController::class,'edit'])->name('patient.edit');
        Route::post('/delete/{patient}',[PatientController::class,'delete'])->name('patient.delete');
    });

    Route::group(['prefix' => '/appoiments'],function() {
        Route::get('/',[AppoimentsController::class,'index'])->name('appoiment');
        Route::post('/upsertInstance',[AppoimentsController::class,'upsertInstance'])->name('appoiment.upsert');
        Route::get('/create/{patient}',[AppoimentsController::class,'create'])->name('appoiment.create');
        Route::get('/edit/{appoiment}/{patient}',[AppoimentsController::class,'edit'])->name('appoiment.edit');
        Route::post('/delete/{appoiment}',[AppoimentsController::class,'delete'])->name('appoiment.delete');
        Route::get('/assessment/{appoiment}',[AppoimentsController::class,'assessment'])->name('appoiment.assessment');

        Route::group(['prefix' => 'services'],function(){
            Route::get('/{appoiment}',[AppoimentsController::class,'appoimentServices'])->name('appoiment.service');
            Route::get('/create/{appoiment}',[AppoimentsController::class,'appoimentServicesCreate'])->name('appoiment.service.create');
            Route::post('/add/{appoiment}',[AppoimentsController::class,'appoimentServicesAdd'])->name('appoiment.service.add');
            Route::post('/delete/{appoiment}/{service}',[AppoimentsController::class,'appoimentServicesDelete'])->name('appoiment.service.delete');
        });

        Route::post('examiantion/pay/{appoiment}',[AppoimentsController::class,'payExaminationFees'])->name('appoiment.examination.fees');
        Route::post('services/pay/{appoiment}',[AppoimentsController::class,'payServicesFees'])->name('appoiment.services.fees');
        Route::get('bill/{appoiment}',[AppoimentsController::class,'appoimentBill']);
        Route::get('receipt/{appoiment}',[AppoimentsController::class,'appoimentReceipt'])->name('appoiment.receipt');

    });

    Route::group(['prefix' => '/service'],function() {
        Route::get('/',[ServiceController::class,'index'])->name('service');
        Route::post('/upsertInstance',[ServiceController::class,'upsertInstance'])->name('service.upsert');
        Route::get('/create',[ServiceController::class,'create'])->name('service.create');
        Route::get('/edit/{service}',[ServiceController::class,'edit'])->name('service.edit');
        Route::post('/delete/{service}',[ServiceController::class,'delete'])->name('service.delete');
    });


    Route::group(['prefix' => '/system'],function() {
        Route::get('/',[SystemController::class,'index'])->name('system');
        Route::post('/upsertInstance',[SystemController::class,'upsertInstance'])->name('system.upsertInstance');
        Route::get('/create',[SystemController::class,'create'])->name('system.create');
        Route::get('/edit/{system}',[SystemController::class,'edit'])->name('system.edit');
        Route::post('/delete/{system}',[SystemController::class,'delete'])->name('system.delete');
    });

    

});

require __DIR__.'/auth.php';
