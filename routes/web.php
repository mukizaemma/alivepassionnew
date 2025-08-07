<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/background',[App\Http\Controllers\HomeController::class,'backgroundDetails'])->name('backgroundDetails');
Route::get('/team',[App\Http\Controllers\HomeController::class,'team'])->name('team');
Route::get('/our-founder',[App\Http\Controllers\HomeController::class,'founder'])->name('founder');
Route::get('/programs',[App\Http\Controllers\HomeController::class,'showPrograms'])->name('showPrograms');
Route::get('/program/{slug}',[App\Http\Controllers\HomeController::class,'singleProgram'])->name('singleProgram');
Route::get('/ministry/{id}',[App\Http\Controllers\HomeController::class,'ministryDetail'])->name('ministryDetail');
Route::get('/campaigns',[App\Http\Controllers\HomeController::class,'campaigns'])->name('campaigns');
Route::get('/campaigns/{slug}',[App\Http\Controllers\HomeController::class,'campaign'])->name('campaign');
Route::get('/Events',[App\Http\Controllers\HomeController::class,'events'])->name('Events');
Route::get('/Messages',[App\Http\Controllers\HomeController::class,'messages'])->name('Messages');
Route::get('/Gallery',[App\Http\Controllers\HomeController::class,'gallery'])->name('gallery');
Route::get('/sponsorship',[App\Http\Controllers\HomeController::class,'Sponsorship'])->name('Sponsorship');
Route::get('/sponsorship/{id}',[App\Http\Controllers\HomeController::class,'childDetail'])->name('childDetail');
Route::get('/contacts',[App\Http\Controllers\HomeController::class,'contacts'])->name('contacts');
Route::get('/impacts',[App\Http\Controllers\HomeController::class,'impacts'])->name('impacts');
Route::get('/testimonials',[App\Http\Controllers\HomeController::class,'testimonials'])->name('testimonials');
Route::get('/testimonials/{id}',[App\Http\Controllers\HomeController::class,'testimony'])->name('testimony');
Route::get('/updates',[App\Http\Controllers\HomeController::class,'posts'])->name('posts');
Route::get('/updates/{slug}',[App\Http\Controllers\HomeController::class,'postSingle'])->name('postSingle');

// Users Action
Route::get('/donate',[App\Http\Controllers\HomeController::class,'donate'])->name('donate');
Route::post('/saveDonation',[App\Http\Controllers\HomeController::class,'saveDonation'])->name('saveDonation');
Route::post('/mailDonation/{id}',[App\Http\Controllers\HomeController::class,'mailDonation'])->name('mailDonation');
Route::get('/deleteDonation/{id}',[App\Http\Controllers\HomeController::class,'deleteDonation'])->name('deleteDonation');

// Users Action
Route::get('/getMembers',[App\Http\Controllers\HomeController::class,'members'])->name('members');
Route::post('/saveMember',[App\Http\Controllers\HomeController::class,'saveMember'])->name('saveMember');
Route::post('/editMember/{id}',[App\Http\Controllers\HomeController::class,'editMember'])->name('editMember');
Route::get('/deleteMember/{id}',[App\Http\Controllers\HomeController::class,'deleteMember'])->name('deleteMember');

Route::get('/Volunteer',[App\Http\Controllers\HomeController::class,'volunteer'])->name('volunteer');
Route::get('/saveVol',[App\Http\Controllers\HomeController::class,'saveVol'])->name('saveVol');
Route::get('/deleteVol',[App\Http\Controllers\HomeController::class,'deleteVol'])->name('deleteVol');

Route::post('/sendMessage',[App\Http\Controllers\HomeController::class,'sendMessage'])->name('sendMessage');
Route::post('/resetGoalRaised/{id}',[App\Http\Controllers\CampainsController::class,'resetGoalRaised'])->name('resetGoalRaised');

// Route::get('/member',[App\Http\Controllers\HomeController::class,'member'])->name('member');

Route::middleware('admin:admin')->group(function(){
    Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('loginForm');
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

});

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth:admin');

    // Route::get('branches', [App\Http\Controllers\BranchController::class, 'index'])->name('branch.index');

    Route::get('/redirects',[App\Http\Controllers\HomeController::class,'redirects'])->name('redirects');

    Route::get('/setting',[App\Http\Controllers\HomeController::class,'setting'])->name('settings');
    Route::post('/saveSetting/{id}',[App\Http\Controllers\HomeController::class,'saveSetting'])->name('saveSetting');

    Route::get('/about',[App\Http\Controllers\HomeController::class,'about'])->name('about');
    Route::POST('/saveAbout/{id}',[App\Http\Controllers\HomeController::class,'saveAbout'])->name('saveAbout');

    Route::get('/aboutUs',[App\Http\Controllers\BackgroundController::class,'background'])->name('background');
    Route::POST('/saveBackg',[App\Http\Controllers\BackgroundController::class,'saveBackg'])->name('saveBackg');

    Route::get('/homePage',[App\Http\Controllers\BackgroundController::class,'homePage'])->name('homePage');
    Route::POST('/saveHom',[App\Http\Controllers\BackgroundController::class,'saveHom'])->name('saveHom');



    // Programs
    Route::get('/progras', [App\Http\Controllers\ProgramController::class, 'index'])->name('programs');
    Route::post('/saveProgram', [App\Http\Controllers\ProgramController::class, 'store'])->name('saveProgram');
    Route::get('/editProgram/{id}', [App\Http\Controllers\ProgramController::class, 'edit'])->name('editProgram');
    Route::post('/updateProgram/{id}', [App\Http\Controllers\ProgramController::class, 'update'])->name('updateProgram');
    Route::get('/destroyProgram/{id}', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('destroyProgram');

    // CHildren
    Route::get('/children', [App\Http\Controllers\SponsorshipController::class, 'index'])->name('children');
    Route::post('/saveChild', [App\Http\Controllers\SponsorshipController::class, 'store'])->name('saveChild');
    Route::get('/editChild/{id}', [App\Http\Controllers\SponsorshipController::class, 'edit'])->name('editChild');
    Route::post('/updateChild/{id}', [App\Http\Controllers\SponsorshipController::class, 'update'])->name('updateChild');
    Route::get('/destroyChild/{id}', [App\Http\Controllers\SponsorshipController::class, 'destroy'])->name('destroyChild');

    // Gallery
    Route::get('/images', [App\Http\Controllers\GalleryController::class, 'index'])->name('images');
    Route::post('/saveGallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('saveGallery');
    Route::get('/editGallery/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('editGallery');
    Route::post('/updateGallery/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('updateGallery');
    Route::get('/destroyGallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('destroyGallery');

    // Gallery
    Route::get('/slides', [App\Http\Controllers\SlidesController::class, 'index'])->name('slides');
    Route::post('/saveSlide', [App\Http\Controllers\SlidesController::class, 'store'])->name('saveSlide');
    Route::get('/editSlide/{id}', [App\Http\Controllers\SlidesController::class, 'edit'])->name('editSlide');
    Route::post('/updateSlide/{id}', [App\Http\Controllers\SlidesController::class, 'update'])->name('updateSlide');
    Route::get('/destroySlide/{id}', [App\Http\Controllers\SlidesController::class, 'destroy'])->name('destroySlide');

    // Events
    Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');
    Route::post('/saveEvent', [App\Http\Controllers\EventController::class, 'store'])->name('saveEvent');
    Route::get('/editEvent/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('editEvent');
    Route::post('/updateEvent/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('updateEvent');
    Route::get('/destroyEvent/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('destroyEvent');

        // Team
    Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff');
    Route::post('/saveStaff', [App\Http\Controllers\StaffController::class, 'store'])->name('saveStaff');
    Route::get('/editStaff/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('editStaff');
    Route::post('/updateStaff/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('updateStaff');
    Route::get('/destroyStaff/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('destroyStaff');

    // Testimonies
    Route::get('/getTestimonials', [App\Http\Controllers\TestimoniesController::class, 'index'])->name('getTestimonials');
    Route::post('/saveTestimony', [App\Http\Controllers\TestimoniesController::class, 'store'])->name('saveTestimony');
    Route::get('/editTestimony/{id}', [App\Http\Controllers\TestimoniesController::class, 'edit'])->name('editTestimony');
    Route::post('/updateTestimony/{id}', [App\Http\Controllers\TestimoniesController::class, 'update'])->name('updateTestimony');
    Route::get('/destroyTestimony/{id}', [App\Http\Controllers\TestimoniesController::class, 'destroy'])->name('destroyTestimony');

    // Partners
    Route::get('/partner', [App\Http\Controllers\PartnersController::class, 'index'])->name('partner');
    Route::post('/savePartner', [App\Http\Controllers\PartnersController::class, 'store'])->name('savePartner');
    Route::get('/editPartner/{id}', [App\Http\Controllers\PartnersController::class, 'edit'])->name('editPartner');
    Route::post('/updatePartner/{id}', [App\Http\Controllers\PartnersController::class, 'update'])->name('updatePartner');
    Route::get('/destroyPartner/{id}', [App\Http\Controllers\PartnersController::class, 'destroy'])->name('destroyPartner');

        Route::get('/get-campaigns',[App\Http\Controllers\CampainsController::class,'index'])->name('campainCrud');
        Route::post('/saveCampaign',[App\Http\Controllers\CampainsController::class,'store'])->name('saveCampain');
        Route::get('/editCampaign/{id}',[App\Http\Controllers\CampainsController::class,'edit'])->name('editCampain');
        Route::post('/updateCampaign/{id}',[App\Http\Controllers\CampainsController::class,'update'])->name('updateCampain');
        Route::post('/updateRaised/{id}',[App\Http\Controllers\CampainsController::class,'updateRaised'])->name('updateRaised');
        Route::get('/deleteCampaign/{id}',[App\Http\Controllers\CampainsController::class,'destroy'])->name('deleteCampain');

    // BLogs
    Route::get('/blogs', [App\Http\Controllers\NewsController::class, 'index'])->name('blog.index');
    Route::post('/saveBlog', [App\Http\Controllers\NewsController::class, 'store'])->name('saveBlog');
    Route::get('/blog/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('editBlog');
    Route::post('/updateBlog/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('updateBlog');
    Route::get('/deleteBlog/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('deleteBlog');
    Route::get('/blogs/{blog}/publish', [App\Http\Controllers\NewsController::class, 'publish'])->name('publishBlog');

    Route::get('/AllMembers',[App\Http\Controllers\MembersController::class,'AllMembers'])->name('AllMembers');
    Route::get('/saveMemb',[App\Http\Controllers\MembersController::class,'saveMemb'])->name('saveMemb');

    // Emails
    Route::get('/webMessages',[App\Http\Controllers\HomeController::class,'webMessages'])->name('webMessages');
    Route::get('/messageReply/{id}',[App\Http\Controllers\HomeController::class,'messageReply'])->name('messageReply');
    Route::post('/sendReply',[App\Http\Controllers\HomeController::class,'sendReply'])->name('sendReply');

});


