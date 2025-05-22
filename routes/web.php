    <?php
    use Illuminate\Support\Facades\Auth;

   
    use App\Http\Controllers\DurasiInkubasiController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\NotifikasiController;
    use App\Http\Controllers\GantiPasswordController;
    use App\Http\Controllers\RotasiTelurController;
    use App\Http\Controllers\JeniskelaminController;
    use App\Http\Controllers\KelembabanSuhuController;
    use Illuminate\Support\Facades\Route as Route;

    // Home & Static
    Route::view('/', 'welcome');
    Route::view('/login', 'login');
    Route::view('/logout', 'welcome');
    Route::view('/home', 'home');
    Route::view('/sensor', 'sensor');
    Route::view('/kelembabansuhu', 'kelembabansuhu');
    Route::view('/pilihkelamin', 'pilihkelamin');
    Route::view('/notifikasi', 'notifikasi');
    Route::view('/profile', 'profile');
    Route::view('/gantipassword', 'gantipassword');
    // Route::view('/jadwalrotasi', 'jadwalrotasi');
    
    // Auth
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Ubah Rotasi
    Route::get('/ubahrotasi', [RotasiTelurController::class, 'indexview'])->name('ubahrotasi.index');

    // Durasi Inkubasi
    Route::get('/durasingkubasi', [DurasiInkubasiController::class, 'index'])->name('durasi.index');
    Route::post('/update-incubation', [DurasiInkubasiController::class, 'update'])->name('durasi.update');

    // Kelembaban
    Route::get('/kelembaban-suhu', [KelembabanSuhuController::class, 'index'])->name('kelembaban-suhu.index');
    Route::post('/kelembaban-suhu', [KelembabanSuhuController::class, 'store'])->name('kelembaban-suhu.store');

    // Jadwal Rotasi
    Route::get('/jadwalrotasi', [RotasiTelurController::class, 'index'])->name('jadwalrotasi.index');
    Route::get('/jadwalrotasi/{rotasiTelur}', [RotasiTelurController::class, 'show']);
    Route::post('/ubahrotasi', [RotasiTelurController::class, 'store'])->name('ubahrotasi.store');

    // Pilih Jenis Kelamin
    Route::post('/pilihkelamin', [JeniskelaminController::class, 'store'])->name('jeniskelamin.update');

    // Ganti Password
    Route::get('/gantipassword', [GantiPasswordController::class, 'showChangePassword'])->name('password.show')->middleware('auth');
    Route::post('/gantipassword', [GantiPasswordController::class, 'changePassword'])->name('password.change')->middleware('auth');

    // notifikasi
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('riwayat.index');
    // Route::get('/notifikasi', [NotifikasiController::class, 'riwayat']);

