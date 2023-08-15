<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\profileUserController;
use App\Http\Controllers\sertifikatController;
use App\Http\Controllers\tutorConntroller;
use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use App\Http\Controllers\SpesalisasiController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Models\Category;
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



Route::get('/admin', function () {
    return view('dashboardAdmin');
});



Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return view('auth/login');
    }
})->name('login');




Route::get('/modul', function () {
    return view('layoutUser/modul');
});
Route::get('/', [LandingController::class, 'showLanding'])->name('landing.show');






Route::get('/kelas-guru', function () {
    return view('layoutUser/kelasGuru');
});

Route::get('/kelas-siswa', function () {
    return view('layoutUser/kelasSiswa');
});

Route::get('/edit-kelas-guru', function () {
    return view('layoutUser/editKelasGuru');
});

Route::get('/profileTutor', [ProfileUserController::class, 'profile'])->name('profile.tutor');

Route::post('/update-spesialisasi', [ProfileUserController::class, 'updateSpesialisasi'])->name('update-spesialisasi');

Route::get('/get-kelurahan', [ProfileUserController::class, 'getKelurahans'])->name('get-kelurahan');

// Route untuk mendapatkan data kecamatan
Route::get('/get-kecamatan', [ProfileUserController::class, 'getKecamatan'])->name('get-kecamatan');

Route::POST('/load-filter', [ProfileUserController::class, 'loadFilter'])->name('load.filter');

Route::get('/get-all-spesialisasi', 'ProfileUserController@getAllSpesialisasi')->name('get-all-spesialisasi');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('home', ['users' => User::get(),]);
    });

Route::get('/landing', [LandingController::class, 'showDashboard'])->name('dahboard.show');
// detailpage
Route::get('/detail', function () {
    return view('layoutUser/detailTutorPage');
});

Route::get('/profileTutor', function () {
    return view('layoutUser/profileTutorPage');
});

Route::get('/pembayaran', function () {
    return view('layoutUser/pembayaran');
});
Route::get('/uploadModul', function () {
    return view('layoutUser/uploadModul');
});


Route::get('/paket', [PaketController::class, 'showPaketPage']);

Route::get('/riwayat', function () {
    return view('layoutUser/riwayatPage');
});
Route::get('/testimoni', function () {
    return view('layoutUser/testimoni');
});
Route::get('/sertifikat', function () {
    return view('layoutUser/sertifikat-tutor');
});
Route::prefix('sertifikat-layout')->group(function () {
    Route::get('/', [sertifikatController::class, 'edit'])->name('sertifikat-layout.edit');
    Route::post('/', [sertifikatController::class, 'updateSertif'])->name('sertifikat-layout.update');
});
Route::get('/tutor', [tutorConntroller::class, 'tutorShow'])->name('tutor');
//
    //user list
    Route::prefix('user-management')->group(function () {
        Route::resource('user', UserController::class);
        Route::post('import', [UserController::class, 'import'])->name('user.import');
        Route::get('export', [UserController::class, 'export'])->name('user.export');
        Route::get('demo', DemoController::class)->name('user.demo');
    });
    Route::prefix('menu-management')->group(function () {
        Route::resource('menu-group', MenuGroupController::class);
        Route::resource('menu-item', MenuItemController::class);
    });
    Route::group(['prefix' => 'role-and-permission'], function () {
        //role
        Route::resource('role', RoleController::class);
        Route::get('role/export', ExportRoleController::class)->name('role.export');
        Route::post('role/import', ImportRoleController::class)->name('role.import');
        //permission
        Route::resource('permission', PermissionController::class);
        Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
        Route::post('permission/import', ImportPermissionController::class)->name('permission.import');
        //assign permission
        Route::get('assign', [AssignPermissionController::class, 'index'])->name('assign.index');
        Route::get('assign/create', [AssignPermissionController::class, 'create'])->name('assign.create');
        Route::get('assign/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign.edit');
        Route::put('assign/{role}', [AssignPermissionController::class, 'update'])->name('assign.update');
        Route::post('assign', [AssignPermissionController::class, 'store'])->name('assign.store');
        //assign user to role
        Route::get('assign-user', [AssignUserToRoleController::class, 'index'])->name('assign.user.index');
        Route::get('assign-user/create', [AssignUserToRoleController::class, 'create'])->name('assign.user.create');
        Route::post('assign-user', [AssignUserToRoleController::class, 'store'])->name('assign.user.store');
        Route::get('assing-user/{user}/edit', [AssignUserToRoleController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign-user/{user}', [AssignUserToRoleController::class, 'update'])->name('assign.user.update');
    });
    Route::prefix('daerah-management')->group(function () {
        Route::resource('kecamatan', KecamatanController::class);
        Route::post('kecamtan/import', [KecamatanController::class, 'import'])->name('kecamatan.import');

        // kelurahan
        Route::resource('kelurahan', KelurahanController::class);
        Route::post('kelurahan/import', [KelurahanController::class, 'import'])->name('kelurahan.import');
    });
    Route::prefix('pengajaran-management')->group(function () {
        Route::resource('spesialisasi', SpesalisasiController::class);
    });
    //membuat tampilan profile admin
    Route::get('/profileAdmin', function () {
        return view('profileAdmin.index');
    });
    Route::post('/upload-profile-picture', [ProfileAdminController::class, 'uploadProfilePicture'])->name('uploadProfilePicture');
    Route::post('/profile/update', [ProfileAdminController::class, 'update'])->name('profile.update');
});