# <header> Laravel multi Authentication </header>


1.php artisan make:model Admin -m

2.php artisan migrate

3.php artisan make:controller Admincontroller

4.frontend layout backend folder

5.config/auth.php

   <code>
          'guards' => [
   
              'admin' => [
   
                  'driver' => 'session',
                  'provider' => 'admins',
   
              ],
   
          ],

      'providers' => [
           'admins' => [
               'driver' => 'eloquent',
               'model' => App\Models\Admin::class,
           ],
        ],
     </code>
     
6. command this : <code>  php artisan make:Middleware Admin </code>

7.Kernel.php file  put this line  

<code>   'admin' => \App\Http\Middleware\Admin::class,    </code> 

8.Route

<code>
   
         // backend authentication 
         Route::get('/admin_login', [App\Http\Controllers\Admincontroller::class, 'index'])->name('admin_loginform');

         Route::post('/admin-login', [App\Http\Controllers\Admincontroller::class, 'adminlogin'])->name('admin-login');

         Route::middleware(['middleware'=> 'admin'])->group(function () {
             Route::get('admindashboard', [App\Http\Controllers\Admincontroller::class, 'admindashboard'])->name('admindashboard');

             Route::get('admin-logout', [App\Http\Controllers\Admincontroller::class, 'adminlogout'])->name('adminlogout');

         });
   
</code>
