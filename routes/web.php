<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvaluasiAtasanController;
use App\Http\Controllers\IkatanDinasController;
use App\Http\Controllers\PenilaianController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
  Route::get("/login-administrasi", [AuthController::class, "index"])->name("login");
  Route::post("/login-administrasi", [AuthController::class, "login"]);
});

Route::middleware(['auth'])->group(function () {

  // Ikatan Dinas
  Route::get("/data-ikatan-dinas", [IkatanDinasController::class, "index"])->name('ikatan_dinas');
  Route::get("/data-ikatan-dinas/edit/{id}", [IkatanDinasController::class, "edit"]);
  Route::put("/data-ikatan-dinas/{id}", [IkatanDinasController::class, "update"]);
  Route::delete("/data-ikatan-dinas/{id}", [IkatanDinasController::class, "destroy"]);
  Route::get("/data-ikatan-dinas/export/excel", [IkatanDinasController::class, "export"])->name('export.ikatan_dinas');
  Route::post("/data-ikatan-dinas/import/excel", [IkatanDinasController::class, "import"])->name('import.ikatan_dinas');
  Route::get("/data-ikatan-dinas/review-file/{id}", [IkatanDinasController::class, "reviewFile"]);
  Route::put("/data-ikatan-dinas/approve/{id}", [IkatanDinasController::class, "approve"]);
  // Ikatan Dinas


  // Ikatan Dinas
  Route::get("/data-evaluasi-atasan", [EvaluasiAtasanController::class, "index"])->name('evaluasi_atasan');
  Route::get("/data-evaluasi-atasan/edit/{id}", [EvaluasiAtasanController::class, "edit"]);
  Route::put("/data-evaluasi-atasan/{id}", [EvaluasiAtasanController::class, "update"]);
  Route::delete("/data-evaluasi-atasan/{id}", [EvaluasiAtasanController::class, "destroy"]);
  Route::get("/data-evaluasi-atasan/export/excel", [EvaluasiAtasanController::class, "export"])->name('export.evaluasi_atasan');
  Route::post("/data-evaluasi-atasan/import/excel", [EvaluasiAtasanController::class, "import"])->name('import.evaluasi_atasan');
  Route::get("/data-evaluasi-atasan/review-file/{id}", [EvaluasiAtasanController::class, "reviewFile"]);
  Route::put("/data-evaluasi-atasan/approve/{id}", [EvaluasiAtasanController::class, "approve"]);
  // Ikatan Dinas


  // Pengaturan akun
  Route::put('/account/change-name', [AccountController::class, "change_name"])->name("change_name");
  Route::put('/account/change-password', [AccountController::class, "change_password"])->name("change_password");
  Route::put('/account/change-ttd', [AccountController::class, "change_ttd"])->name("change_ttd");
  // Pengaturan akun

  // Logout
  Route::get("/logout", [AuthController::class, "logout"])->name('logout');
});


// Approval
Route::get("/", [ApprovalController::class, "index"]);
Route::post("/", [ApprovalController::class, "store"]);
Route::post("/ikatan-dinas", [ApprovalController::class, "getIkatanDinas"]);
Route::get("/ikatan-dinas/review-file/{id}", [ApprovalController::class, "reviewFile"]);
Route::get("/ikatan-dinas/approval", [ApprovalController::class, "pageFinished"])->name("finish");
// Approval


// Evaluasi Atasan
Route::get("/evaluasi-atasan", [PenilaianController::class, "index"]);
Route::post("/evaluasi-atasan", [PenilaianController::class, "store"]);
Route::post("/evaluasi-atasan/data", [PenilaianController::class, "getData"]);
Route::get("/evaluasi-atasan/selesai", [PenilaianController::class, "pageFinished"]);
Route::get("/review-file/evaluasi/{kode}", [PenilaianController::class, "reviewFile"]);
// Evaluasi Atasan