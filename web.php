Route::get('/admin_login', [App\Http\Controllers\Admincontroller::class, 'index'])->name('admin_loginform');
Route::post('/admin-login', [App\Http\Controllers\Admincontroller::class, 'adminlogin'])->name('admin-login');
Route::middleware(['middleware'=> 'admin'])->group(function () {
    Route::get('admindashboard', [App\Http\Controllers\Admincontroller::class, 'admindashboard'])->name('admindashboard');
    Route::get('admin-logout', [App\Http\Controllers\Admincontroller::class, 'adminlogout'])->name('adminlogout');
});