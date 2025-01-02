<?php

use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;



Route::get('/', [SiteController::class, 'index']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::get('events', [SiteController::class, 'events'])->name('site.events');
Route::get('event-detail/{id}', [SiteController::class, 'event_detail'])->name('site.event.detail');
Route::get('get-services/{vendorId}', [SiteController::class, 'get_services'])->name('get_services');
Route::post('booking/save', [SiteController::class, 'save_booking'])->name('save_booking');
Route::get('booking-success', [SiteController::class, 'success_booking'])->name('success_booking');

Route::post('/contact-save', [ContactController::class, 'store'])->name('contact.submit');



Route::get('/my-bookings', function () {
    $bookings = Booking::where('customer_id', Auth::user()->id)->get();
    return view('site.my_bookings', compact('bookings'));

})->middleware(['auth']);

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role == 'customer') {
        return view('site.index');
    } else {
        return view('admin.dashboard');
    }
})->middleware(['auth'])->name('dashboard');




Route::get('/contacts', function () {

    $contacts = Contact::all();
    return view('admin.contact', compact('contacts'));

})->middleware(['auth'])->name('admin.contacts');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::prefix('vendors')->controller(VendorController::class)->as('vendors.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('services')->controller(ServiceController::class)->as('services.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('update', 'update')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('events')->controller(EventController::class)->as('events.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('update', 'update')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('customers')->controller(CustomerController::class)->as('customers.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('update', 'update')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('bookings')->controller(BookingController::class)->as('bookings.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('update', 'update')->name('update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('status/{id}/{status}', 'status_change')->name('status_change');
    });
});






require __DIR__ . '/auth.php';
