<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\PerkController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UniversityAdminController;
use App\Http\Controllers\SideBarController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\alumni\AlumniFeedController;
use App\Http\Controllers\alumni\AlumniPerkController;
use App\Http\Controllers\alumni\AlumniAlumniController;
use App\Http\Controllers\alumni\AlumniForumController;
use App\Http\Controllers\alumni\AlumniReplyController;
use App\Http\Controllers\alumni\AlumniJobController;
use App\Http\Controllers\alumni\AlumniGalleryController;
use App\Http\Controllers\alumni\AlumniInfoUserController;
use App\Http\Controllers\alumni\AlumniAlumnicardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

	/* Admin Route Group*/
	Route::group([
		'middleware' => 'is_admin',
	], function(){
		
    Route::get('/', [HomeController::class, 'home']);
	
	Route::get('forum', function () {
		return view('forum');
	})->name('forum');

	Route::get('job', function () {
		return view('job');
	})->name('job');
	
	Route::get('id-application', function () {
		return view('id-application');
	})->name('id-application');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');


	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');


	Route::get('alumni-table', function () {
		return view('laravel-examples/alumni-table');
	})->name('alumni-table');
	

	Route::get('about', function () {
		return view('about');
	})->name('about');

	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('side-bar', function () {
		return view('layouts/navbars/auth/user-management');
	})->name('side-bar');

	Route::get('/alumni/pdf', [AlumniController::class, 'createPDF']);

	Route::get('side-bar', [SideBarController::class, 'index']);

	Route::get('/search-alumni', [AlumniController::class, 'search']);
	Route::get('/search-job', [JobController::class, 'search']);

	Route::resource('feeds', FeedController::class)->except([
		'show'
	]);

	Route::resource('job', JobController::class)->except([
		'show'
	]);

	Route::get('file-export', [AlumniController::class, 'fileExport'])->name('file-export');
	
	Route::patch('university-profile', [UniversityAdminController::class, 'store'])->name('update.univProfile');
	Route::get('university-profile', [UniversityAdminController::class, 'index']);
	Route::delete('university-profile/{id}', [UniversityAdminController::class, 'deleteIdApplication'])->name('delete.IdApplication');
	Route::delete('university-profile/{id}/course', [UniversityAdminController::class, 'deleteCourse'])->name('delete.course');
	Route::post('university-profile', [UniversityAdminController::class, 'addCourse'])->name('add.course');

	Route::get('user-management', [AlumniController::class, 'index']);

	Route::get('/dashboard', [RequestController::class, 'index'])->name('dashboard');
	Route::post('/dasboard/{id}/feed', [RequestController::class, 'approvedFeed'])->name('dashboard.approve');
	Route::delete('/dasboard/{id}/feed', [RequestController::class, 'deleteFeed'])->name('dashboard.delete');

	Route::patch('/dasboard/{id}/logo', [RequestController::class, 'updateLogo'])->name('logo.update');

	Route::post('/dasboard/{id}', [RequestController::class, 'approvedGallery'])->name('dashboard.approveGallery');
	Route::delete('/dasboard/{id}', [RequestController::class, 'deleteGallery'])->name('dashboard.deleteGallery');

	Route::post('/dasboard/{id}/alumni', [RequestController::class, 'approvedAlumni'])->name('dashboard.approveAlumni');
	Route::delete('/dasboard/{id}/alumni', [RequestController::class, 'deleteAlumni'])->name('dashboard.deleteAlumni');


	Route::post('/forum', [ForumController::class, 'store']);
	Route::get('/forum', [ForumController::class, 'index']);
	Route::patch('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
	Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

	Route::patch('/forum/{id}/reply', [ReplyController::class, 'updateReply'])->name('reply.update');
	Route::delete('/forum/{id}/reply', [ReplyController::class, 'destroyReply'])->name('reply.destroy');

	Route::post('/gallery', [GalleryController::class, 'store']);
	Route::get('/gallery', [GalleryController::class, 'index']);
	Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

	Route::get('/reply', [ReplyController::class, 'index']);
	Route::post('/reply/{reply}', [ReplyController::class, 'store'])->name('reply.store');

	Route::get('/about', [PerkController::class, 'index']);
	Route::post('/perk', [PerkController::class, 'store'])->name('perk.store');
	Route::delete('/perk/{id}', [PerkController::class, 'destroy'])->name('perk.destroy');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::get('/user-profile', [InfoUserController::class, 'index']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	});

	/* Alumni Route Group*/
	Route::group([
		'prefix' => 'alumni',
		'middleware' => 'is_alumni',
		'as' => 'alumni.',	
	], function(){
		Route::get('/feeds', [AlumniFeedController::class, 'index']);
		Route::post('/feeds', [AlumniFeedController::class, 'store']);
		Route::patch('/feeds/{id}/feeds', [AlumniFeedController::class, 'update'])->name('feeds.update');
		Route::delete('/feeds/{id}/feeds', [AlumniFeedController::class, 'destroy'])->name('feeds.destroy');
		
		Route::get('/logout', [SessionsController::class, 'destroy']);
		Route::get('/login', function () {
			return view('/feeds');
		})->name('sign-up');

		Route::get('user-management', function () {
			return view('laravel-examples/user-management');
		})->name('user-management');

		Route::get('/about', [AlumniPerkController::class, 'index']);
		Route::get('/user-management', [AlumniAlumniController::class, 'index']);
		Route::get('/search-alumni', [AlumniAlumniController::class, 'search']);

		Route::post('/forum', [AlumniForumController::class, 'store']);
		Route::get('/forum', [AlumniForumController::class, 'index']);
		Route::patch('/forum/{id}', [AlumniForumController::class, 'update'])->name('forum.update');
		Route::delete('/forum/{id}', [AlumniForumController::class, 'destroy'])->name('forum.destroy');

		Route::get('/reply', [AlumniReplyController::class, 'index']);
		Route::post('/reply/{reply}', [AlumniReplyController::class, 'store'])->name('reply.store');
		Route::patch('/forum/{id}/reply', [AlumniReplyController::class, 'updateReply'])->name('reply.update');
		Route::delete('/forum/{id}/reply', [AlumniReplyController::class, 'destroyReply'])->name('reply.destroy');

		Route::resource('/job', AlumniJobController::class)->except([
			'show'
		]);

		Route::get('/search-job', [AlumniJobController::class, 'search']);

		Route::post('/gallery', [AlumniGalleryController::class, 'store']);
		Route::get('/gallery', [AlumniGalleryController::class, 'index']);
		Route::delete('/gallery/{id}', [AlumniGalleryController::class, 'destroy'])->name('gallery.destroy');

		Route::get('/user-profile', [AlumniInfoUserController::class, 'create']);
		Route::get('/user-profile', [AlumniInfoUserController::class, 'index']);
		Route::post('/user-profile', [AlumniInfoUserController::class, 'store']);
	
		Route::patch('/user-profile/{id}/profile', [AlumniInfoUserController::class, 'updateProfile'])->name('profile.update');
		Route::resource('id-application', AlumniAlumnicardController::class)->except([
			'show','create'
		]);
		
	});
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register.alumni');
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/registerFinal', [RegisterController::class, 'create']);
    Route::post('/registerFinal', [RegisterController::class, '']);
});

