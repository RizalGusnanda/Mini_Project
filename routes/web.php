<?php
use App\Http\Controllers\DemoController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\ProfileAdminController;
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
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    } else {
        return view('auth/login');
    }
})->name('login');
  // detailpage
Route::get('/', function () {
    return view('layoutUser/detailTutorPage');
});
Route::get('/tutor', function () {
    return view('layoutUser/tutorPage');
});
Route::get('/landing', function () {
    return view('layoutUser/landingPage');
});

Route::get('/paket', function () {
    return view('layoutUser/paketPage');
});
Route::get('/profileTutor', function () {
    return view('layoutUser/profileTutorPage');
});
Route::get('/riwayat', function () {
    return view('layoutUser/riwayatPage');
});
Route::get('/testimoni', function () {
    return view('layoutUser/testimoni');
});
Route::get('/paket', function () {
    return view('layoutUser/paketPage');
});
Route::get('/profileTutor', function () {
    return view('layoutUser/profileTutorPage');
});
Route::get('/riwayat', function () {
    return view('layoutUser/riwayatPage');
});
Route::get('/paket', function () {
    return view('layoutUser/paketPage');
});
Route::get('/profileTutor', function () {
    return view('layoutUser/profileTutorPage');
});
Route::get('/riwayat', function () {
    return view('layoutUser/riwayatPage');
});

Route::get('/testimoni', function () {
    return view('layoutUser/testimoni');
});
Route::get('/sertifikat', function () {
    return view('layoutUser/sertifikat-tutor');
});



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('home', ['users' => User::get(),]);
    });
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
        Route::resource('kecamatan',KecamatanController::class);
        
        Route::post('kecamtan/import', [KecamatanController::class, 'import'])->name('kecamatan.import');
        
         // kelurahan
        Route::resource('kelurahan',KelurahanController::class);
        Route::post('kelurahan/import', [KelurahanController::class, 'import'])->name('kelurahan.import');
    });
    Route::prefix('pengajaran-management')->group(function () {
        Route::resource('spesialisasi',SpesalisasiController::class);
    });
    //membuat tampilan profile admin
    Route::get('/profileAdmin', function () {
        return view('profileAdmin.index');
    });
    Route::post('/upload-profile-picture', [ProfileAdminController::class, 'uploadProfilePicture'])->name('uploadProfilePicture');
    Route::post('/profile/update', [ProfileAdminController::class, 'update'])->name('profile.update');
});
