<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;



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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth:web')->name('verification.notice');

// Admin Email Verify

Route::middleware('auth:admin')->group(function () {

Route::get('/admin/email/verify', function () {
    return view('admin.auth.verify-email');
})->name('admin.verification.notice');

Route::post('/admin/email/verification-notification', 'App\Http\Controllers\Admin\EmailVerificationNotificationController@store')->name('admin.verification.send');
Route::get('/admin/email/verify/{id}/{hash}', 'App\Http\Controllers\Admin\VerifyEmailController@__invoke')->name('admin.verification.verify');
});


Route::get('/', function () {
    $sliders = DB::table('sliders')->where('page_id', 'home')->get();
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('home_services')->get();
    $images = DB::table('multipics')->get();
    return view('home', compact('brands', 'abouts', 'services', 'images', 'sliders'));
})->name('home');

Route::post('/newsletter', App\Http\Controllers\NewsletterController::class)->name('newsletter');

Route::get('/about', function () {
    return view('about');
});

// About Us Page Route

Route::get('/about', 'App\Http\Controllers\AboutPageController@aboutUs')->name('page.about');

// Team Route

Route::get('/about/team', 'App\Http\Controllers\TeamController@aboutTeam')->name('page.about_team');

// Testimonials Route

Route::get('/about/testimonials', 'App\Http\Controllers\TestimonialController@aboutTes')->name('page.about_tes');

// Services Page Route

Route::get('/services', 'App\Http\Controllers\ServicesPageController@services')->name('page.services');

// Portfolio Page Route

Route::get('/portfolio', 'App\Http\Controllers\PortfolioController@portfolio')->name('portfolio');

// Pricing Page Route

Route::get('/pricing', 'App\Http\Controllers\PricingController@pricing')->name('page.pricing');

// Blog Page Route

Route::get('/blog', 'App\Http\Controllers\BlogController@blog')->name('page.blog');
Route::get('/blog/post/{id}', 'App\Http\Controllers\BlogController@blogSingle')->name('blog.single');
Route::get('/blog/category/{id}', 'App\Http\Controllers\BlogController@category')->name('blog.category');
Route::get('/blog/tag/{id}', 'App\Http\Controllers\BlogController@tag')->name('blog.tag');

// Article Route

Route::get('/blog/articles/{id}', 'App\Http\Controllers\ArticleController@article')->name('page.article');

// Contact Page Route

Route::get('/contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::post('/contact/form', 'App\Http\Controllers\ContactController@contactForm')->name('contact.form');

// Admin profile Routes

Route::middleware('admin:admin')->group(function () {
Route::get('/admin/login', 'App\Http\Controllers\AdminController@loginForm')->name('admin.login.form');
Route::post('/admin/login', 'App\Http\Controllers\AdminController@store')->name('admin.login');

Route::get('/admin/forgot-password', 'App\Http\Controllers\Admin\PasswordResetLinkController@create')->name('admin.password.request');
Route::post('/admin/forgot-password', 'App\Http\Controllers\Admin\PasswordResetLinkController@store')->name('admin.password.email');

Route::post('/admin/reset-password', 'App\Http\Controllers\Admin\NewPasswordController@store')->name('admin.pass-reset.update');
Route::get('/admin/reset-password/{token}', 'App\Http\Controllers\Admin\NewPasswordController@create')->name('admin.password.reset');

});



Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'admin.verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // Home Sliders Routes

Route::get('/admin/sliders', 'App\Http\Controllers\HomeController@adminSlider')->name('sliders.admin');
Route::get('/admin/sliders/add', 'App\Http\Controllers\HomeController@add')->name('sliders.add');
Route::post('/admin/sliders/store', 'App\Http\Controllers\HomeController@store')->name('sliders.store');
Route::get('/admin/sliders/edit/{id}', 'App\Http\Controllers\HomeController@edit')->name('sliders.edit');
Route::post('/admin/sliders/update/{id}', 'App\Http\Controllers\HomeController@update')->name('sliders.update');
Route::get('/admin/sliders/delete/{id}', 'App\Http\Controllers\HomeController@delete')->name('sliders.delete');

// Home About Routes

Route::get('/admin/about', 'App\Http\Controllers\AboutController@homeAbout')->name('about.home');
Route::get('/admin/about/add', 'App\Http\Controllers\AboutController@addAbout')->name('about.add');
Route::post('/admin/about/store', 'App\Http\Controllers\AboutController@storeAbout')->name('about.store');
Route::get('/admin/about/edit/{id}', 'App\Http\Controllers\AboutController@edit')->name('about.edit');
Route::post('/admin/about/update/{id}', 'App\Http\Controllers\AboutController@update')->name('about.update');
Route::get('/admin/about/delete/{id}', 'App\Http\Controllers\AboutController@delete')->name('about.delete');

// Home Services Routes

Route::get('/admin/services', 'App\Http\Controllers\ServiceController@homeService')->name('services.home');
Route::get('/admin/services/add', 'App\Http\Controllers\ServiceController@addService')->name('services.add');
Route::post('/admin/services/store', 'App\Http\Controllers\ServiceController@storeService')->name('services.store');
Route::get('/admin/services/edit/{id}', 'App\Http\Controllers\ServiceController@edit')->name('services.edit');
Route::post('/admin/services/update/{id}', 'App\Http\Controllers\ServiceController@update')->name('services.update');
Route::get('/admin/services/delete/{id}', 'App\Http\Controllers\ServiceController@delete')->name('services.delete');

// Home Portfolio Routes

Route::get('/admin/portfolio', 'App\Http\Controllers\MultiController@multipic')->name('multi.image');
Route::post('/admin/portfolio/add', 'App\Http\Controllers\MultiController@addImg')->name('images.store');
Route::get('/admin/portfolio/delete/{id}', 'App\Http\Controllers\MultiController@deleteMulti')->name('images.delete');

// Home Brands Routes

Route::get('/admin/brands', 'App\Http\Controllers\BrandController@all')->name('brands');
Route::post('/admin/brands/add', 'App\Http\Controllers\BrandController@addBrand')->name('brands.store');
Route::get('/admin/brands/edit/{id}', 'App\Http\Controllers\BrandController@edit')->name('brands.edit');
Route::post('/admin/brands/update/{id}', 'App\Http\Controllers\BrandController@update')->name('brands.update');
Route::get('/admin/brands/delete/{id}', 'App\Http\Controllers\BrandController@delete')->name('brands.delete');

// *** About Us Page Routes ***

// Team Admin Routes

Route::get('/admin/about/team', 'App\Http\Controllers\TeamController@team')->name('admin.team');
Route::get('/admin/about/team/add', 'App\Http\Controllers\TeamController@adminAddMember')->name('member.add');
Route::post('/admin/about/team/store', 'App\Http\Controllers\TeamController@adminStoreMember')->name('member.store');
Route::get('/admin/about/team/edit/{id}', 'App\Http\Controllers\TeamController@adminEditMember')->name('member.edit');
Route::post('/admin/about/team/update/{id}', 'App\Http\Controllers\TeamController@adminUpdateMember')->name('member.update');
Route::get('/admin/about/team/delete/{id}', 'App\Http\Controllers\TeamController@adminDeleteMember')->name('member.delete');

// Skills Routes

Route::get('/admin/about/skills', 'App\Http\Controllers\SkillController@skills')->name('admin.skills');
Route::post('/admin/about/skills/store', 'App\Http\Controllers\SkillController@adminStoreSkill')->name('skill.store');
Route::get('/admin/about/skills/edit/{id}', 'App\Http\Controllers\SkillController@adminEditSkill')->name('skill.edit');
Route::post('/admin/about/skills/update/{id}', 'App\Http\Controllers\SkillController@adminUpdateSkill')->name('skill.update');
Route::get('/admin/about/skills/delete/{id}', 'App\Http\Controllers\SkillController@adminDeleteSkill')->name('skill.delete');

// Testimonials Routes

Route::get('/admin/about/testimonials', 'App\Http\Controllers\TestimonialController@tes')->name('admin.tes');
Route::get('/admin/about/testimonials/add', 'App\Http\Controllers\TestimonialController@adminAddTes')->name('tes.add');
Route::post('/admin/about/testimonials/store', 'App\Http\Controllers\TestimonialController@adminStoreTes')->name('tes.store');
Route::get('/admin/about/testimonials/edit/{id}', 'App\Http\Controllers\TestimonialController@adminEditTes')->name('tes.edit');
Route::post('/admin/about/testimonials/update/{id}', 'App\Http\Controllers\TestimonialController@adminUpdateTes')->name('tes.update');
Route::get('/admin/about/testimonials/delete/{id}', 'App\Http\Controllers\TestimonialController@adminDeleteTes')->name('tes.delete');

// *** Services Page Route ***

// Features Routes

Route::get('/admin/services/features', 'App\Http\Controllers\ServicesPageController@features')->name('admin.services.features');
Route::get('/admin/services/features/add', 'App\Http\Controllers\ServicesPageController@adminAddFeature')->name('feature.add');
Route::post('/admin/services/features/store', 'App\Http\Controllers\ServicesPageController@adminStoreFeature')->name('feature.store');
Route::get('/admin/services/features/edit/{id}', 'App\Http\Controllers\ServicesPageController@adminEditFeature')->name('feature.edit');
Route::post('/admin/services/features/update/{id}', 'App\Http\Controllers\ServicesPageController@adminUpdateFeature')->name('feature.update');
Route::get('/admin/services/features/delete/{id}', 'App\Http\Controllers\ServicesPageController@adminDeleteFeature')->name('feature.delete');

// *** Pricing Page Route ***

// Pricing Routes

Route::get('/admin/pricing', 'App\Http\Controllers\PricingController@adminPricing')->name('admin.pricing');
Route::get('/admin/pricing/add', 'App\Http\Controllers\PricingController@adminAddPrice')->name('price.add');
Route::post('/admin/pricing/store', 'App\Http\Controllers\PricingController@adminStorePrice')->name('price.store');
Route::get('/admin/pricing/edit/{id}', 'App\Http\Controllers\PricingController@adminEditPrice')->name('price.edit');
Route::post('/admin/pricing/{id}', 'App\Http\Controllers\PricingController@adminUpdatePrice')->name('price.update');
Route::get('/admin/pricing/delete/{id}', 'App\Http\Controllers\PricingController@adminDeletePrice')->name('price.delete');

// FAQ Admin Routes

Route::get('/admin/faq', 'App\Http\Controllers\FAQController@adminFAQ')->name('admin.faq');
Route::get('/admin/faq/add', 'App\Http\Controllers\FAQController@adminAddFAQ')->name('faq.add');
Route::post('/admin/faq/store', 'App\Http\Controllers\FAQController@adminStoreFAQ')->name('faq.store');
Route::get('/admin/faq/edit/{id}', 'App\Http\Controllers\FAQController@adminEditFAQ')->name('faq.edit');
Route::post('/admin/faq/{id}', 'App\Http\Controllers\FAQController@adminUpdateFAQ')->name('faq.update');
Route::get('/admin/faq/delete/{id}', 'App\Http\Controllers\FAQController@adminDeleteFAQ')->name('faq.delete');

// *** Blog Routes ***

// Author Routes

Route::get('/admin/blog/authorship', 'App\Http\Controllers\AuthorController@authorship')->name('admin.authorship');
Route::get('/admin/blog/author/add', 'App\Http\Controllers\AuthorController@adminAddAuthor')->name('author.add');
Route::post('/admin/blog/author/store', 'App\Http\Controllers\AuthorController@adminStoreAuthor')->name('author.store');
Route::get('/admin/blog/author/edit/{id}', 'App\Http\Controllers\AuthorController@adminEditAuthor')->name('author.edit');
Route::post('/admin/blog/author/update/{id}', 'App\Http\Controllers\AuthorController@adminUpdateAuthor')->name('author.update');
Route::get('/admin/blog/author/delete/{id}', 'App\Http\Controllers\AuthorController@adminDeleteAuthor')->name('author.delete');

// Articles Routes

Route::get('/admin/blog/articles', 'App\Http\Controllers\ArticleController@adminArticle')->name('admin.articles');
Route::get('/admin/blog/articles/trashed', 'App\Http\Controllers\ArticleController@trashed')->name('admin.articles.trashed');
Route::get('/admin/blog/articles/add', 'App\Http\Controllers\ArticleController@adminAddArticle')->name('article.add');
Route::post('/admin/blog/articles/store', 'App\Http\Controllers\ArticleController@adminStoreArticle')->name('article.store');
Route::get('/admin/blog/articles/edit/{id}', 'App\Http\Controllers\ArticleController@adminEditArticle')->name('article.edit');
Route::post('/admin/blog/articles/update/{id}', 'App\Http\Controllers\ArticleController@adminUpdateArticle')->name('article.update');
Route::get('/admin/blog/articles/softdelete/{id}', 'App\Http\Controllers\ArticleController@softDelete')->name('softdelete.article');
Route::get('/admin/blog/articles/restore/{id}', 'App\Http\Controllers\ArticleController@restore')->name('article.restore');
Route::get('/admin/blog/articles/permdelete/{id}', 'App\Http\Controllers\ArticleController@permDelete')->name('article.permdelete');

// Comments Routes

Route::get('/admin/comments', 'App\Http\Controllers\CommentController@adminComments')->name('admin.comments');
Route::get('/admin/comments/trashed', 'App\Http\Controllers\CommentController@trashed')->name('admin.comments.trashed');
Route::get('/admin/comments/delete/{id}', 'App\Http\Controllers\CommentController@adminDeleteComment')->name('admin.comment.delete');
Route::get('/admin/comments/softdelete/{id}', 'App\Http\Controllers\CommentController@softDelete')->name('admin.softdelete.comment');
Route::get('/admin/comments/restore/{id}', 'App\Http\Controllers\CommentController@restore')->name('admin.comment.restore');
Route::get('/admin/comments/permdelete/{id}', 'App\Http\Controllers\CommentController@permDelete')->name('admin.comment.permdelete');

// Categories Routes

Route::get('/admin/categories', 'App\Http\Controllers\CategoryController@all')->name('categories');
Route::post('/admin/categories/add', 'App\Http\Controllers\CategoryController@add')->name('categories.store');
Route::get('/admin/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');
Route::post('/admin/categories/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::get('/admin/categories/softdelete/{id}', 'App\Http\Controllers\CategoryController@softDelete')->name('softdelete.categories');
Route::get('/admin/categories/restore/{id}', 'App\Http\Controllers\CategoryController@restore')->name('categories.restore');
Route::get('/admin/categories/permdelete/{id}', 'App\Http\Controllers\CategoryController@permDelete')->name('categories.permdelete');

// Tag Routes

Route::get('/admin/blog/tags', 'App\Http\Controllers\TagController@adminTag')->name('admin.tags');
Route::post('/admin/blog/tags/store', 'App\Http\Controllers\TagController@adminStoreTag')->name('tag.store');
Route::get('/admin/blog/tags/edit/{id}', 'App\Http\Controllers\TagController@adminEditTag')->name('tag.edit');
Route::post('/admin/blog/tags/update/{id}', 'App\Http\Controllers\TagController@adminUpdateTag')->name('tag.update');
Route::get('/admin/blog/tags/softdelete/{id}', 'App\Http\Controllers\TagController@tagSoftDelete')->name('tag.softdelete');
Route::get('/admin/blog/tags/restore/{id}', 'App\Http\Controllers\TagController@tagRestore')->name('tag.restore');
Route::get('/admin/blog/tags/permdelete/{id}', 'App\Http\Controllers\TagController@tagPermDelete')->name('tag.permdelete');

// *** Contact Routes ***

Route::get('/admin/contact', 'App\Http\Controllers\ContactController@adminContact')->name('admin.contact');
Route::get('/admin/contact/add', 'App\Http\Controllers\ContactController@adminAddContact')->name('contact.add');
Route::post('/admin/contact/store', 'App\Http\Controllers\ContactController@adminStoreContact')->name('contact.store');
Route::get('/admin/contact/edit/{id}', 'App\Http\Controllers\ContactController@adminEditContact')->name('contact.edit');
Route::post('/admin/contact/update/{id}', 'App\Http\Controllers\ContactController@adminUpdateContact')->name('contact.update');
Route::get('/admin/contact/delete/{id}', 'App\Http\Controllers\ContactController@adminDeleteContact')->name('contact.delete');
Route::get('/admin/message', 'App\Http\Controllers\ContactController@adminMessage')->name('admin.message');
Route::get('/admin/message/delete/{id}', 'App\Http\Controllers\ContactController@adminDeleteMessage')->name('message.delete');
});

//* ********* */

Route::middleware('auth:admin')->group(function () {

// Change Password and Admin Profile Route

Route::get('/admin/password', 'App\Http\Controllers\ChangePassController@changePass')->name('admin.password.change');
Route::post('/admin/password/update', 'App\Http\Controllers\ChangePassController@updatePass')->name('admin.password.update');

// Admin Profile

Route::get('/admin/profile', 'App\Http\Controllers\Admin\AdminProfileController@show')->name('admin.profile.show');
Route::post('/admin/profile/update', 'App\Http\Controllers\ChangePassController@adminUpdateProfile')->name('update.admin.profile');
Route::get('/admin/logout', 'App\Http\Controllers\ChangePassController@logout')->name('admin.logout');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('dashboard');

    // Comments Routes

Route::get('/user/{id}/comments', 'App\Http\Controllers\CommentController@userComments')->name('user.comments');
Route::get('/user/comments/delete/{id}', 'App\Http\Controllers\CommentController@userDeleteComment')->name('user.comment.delete');

// Checkout
Route::get('/user/checkout/{id}', 'App\Http\Controllers\CheckoutController@checkout')->name('user.checkout');

// Payment Step

Route::post('/user/payment', 'App\Http\Controllers\CheckoutController@paymentPage')->name('payment.step');
Route::post('/user/payment/process', 'App\Http\Controllers\CheckoutController@payment')->name('subscribe.post');
Route::get('/user/unsubscribe', 'App\Http\Controllers\CheckoutController@unsubscribe')->name('unsubscribe');

Route::get('/invoices', 'App\Http\Controllers\CheckoutController@invoices')->name('invoices');
Route::middleware(['payingCustomer'])->get('/user/invoice/{invoice}', 'App\Http\Controllers\CheckoutController@invoicesPost')->name('invoices.post');
});

Route::middleware('auth:web')->group(function () {

// Change Password and User Profile Route

Route::get('/user/password', 'App\Http\Controllers\UserChangePassController@changePass')->name('user.password.change');
Route::post('/user/password/update', 'App\Http\Controllers\UserChangePassController@updatePass')->name('user.password.update');

// User Profile

Route::get('/user/profile', 'App\Http\Controllers\User\UserProfileController@show')->name('user.profile.show');
Route::post('/user/profile/update', 'App\Http\Controllers\UserChangePassController@userUpdateProfile')->name('update.user.profile');
Route::get('/user/logout', 'App\Http\Controllers\UserChangePassController@logout')->name('user.logout');
});

Route::post('/stripe/webhook', 'App\Http\Controllers\WebhookController@handleWebhook');

Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::post('/reply/store', 'App\Http\Controllers\CommentController@replyStore')->name('reply.add');