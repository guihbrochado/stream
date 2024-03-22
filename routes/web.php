<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\apps\AccountController;
use App\Http\Controllers\apps\BrokerController;
use App\Http\Controllers\apps\CockpitController;
use App\Http\Controllers\apps\CustomerController;
use App\Http\Controllers\apps\ChargesController;
use App\Http\Controllers\apps\CartController;
use App\Http\Controllers\apps\DashboardController;
use App\Http\Controllers\apps\DealController;
use App\Http\Controllers\apps\ExpertAdvisorController;
use App\Http\Controllers\apps\FaqCategoryController;
use App\Http\Controllers\apps\FaqController;
use App\Http\Controllers\apps\LicenseController;
use App\Http\Controllers\apps\UsagePolicyCategoryController;
use App\Http\Controllers\apps\UsagePolicyController;
use App\Http\Controllers\apps\StatusCopyController;
use App\Http\Controllers\apps\StoreCompanyController;
use App\Http\Controllers\apps\StoreTraderController;
use App\Http\Controllers\apps\SupervisorController;
use App\Http\Controllers\apps\SupervisorGroupController;
use App\Http\Controllers\apps\SupervisorGroupExpertController;
use App\Http\Controllers\apps\SupervisorGroupMemberController;
use App\Http\Controllers\apps\TicketController;
use App\Http\Controllers\apps\TicketReplyController;
use App\Http\Controllers\apps\UserController;
use App\Http\Controllers\apps\StoreController;
use App\Http\Controllers\Web\CalendarController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\apps\TermsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apps\OrderController;
use App\Http\Controllers\apps\OrderErrorController;
use App\Http\Controllers\apps\TradersCoursesController;
use App\Http\Controllers\apps\AboutController;
use App\Http\Controllers\apps\ContactController;
use App\Http\Controllers\apps\PlanController;
use App\Http\Controllers\apps\BlogController;
use App\Http\Controllers\apps\AudioController;
use App\Http\Controllers\apps\BlogVideoController;
use App\Http\Controllers\apps\LinkController;
use App\Http\Controllers\apps\QuoteController;
use App\Http\Controllers\apps\ShopController;
use App\Http\Controllers\apps\MyAccountController;
use App\Http\Controllers\apps\ManageController;
use App\Http\Controllers\apps\CourseController;
use App\Http\Controllers\apps\LiveRoomController;
use App\Http\Controllers\apps\CoursesController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */
/*
  Route::get('/', function () {
  return view('welcome');
  });
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
});

Route::get('/index', function () {
    return view('pages-under_development');
})->name('index');
Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');
Route::post('/terms', [TermsController::class, 'acceptTerms'])->name('terms.acceptTerms');

Route::middleware(['checkTermsAccepted'])->group(function () {
    // rotas do template:
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/ajaxCoursesModules/{idcourse}', [App\Http\Controllers\HomeController::class, 'ajaxCoursesModules'])->name('ajaxCoursesModules');
    Route::get('/ajaxCoursesLessons/{idcourse}/{idmodules}', [App\Http\Controllers\HomeController::class, 'ajaxCoursesLessons'])->name('ajaxCoursesLessons');
    Route::get('/traders_courses', [TradersCoursesController::class, 'index'])->name('traders_courses.index');

    //Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
    //Language Translation
    Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
    Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

    Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'permission:user|client']], function () {

        Route::get('/about', [AboutController::class, 'index'])->name('about.index');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/plans', [PlanController::class, 'index'])->name('plan.index');
        //ROTAS BLOG
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/audio', [AudioController::class, 'index'])->name('audio.index');
        Route::get('/blog-video', [BlogVideoController::class, 'index'])->name('blogvideo.index');
        Route::get('/link', [LinkController::class, 'index'])->name('link.index');
        Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
       
        Route::get('/course-detail', [CourseController::class, 'detail'])->name('course.detail');
        Route::get('/course-lesson', [CourseController::class, 'lesson'])->name('course.lesson');
        
        //LIVE ROOM
        Route::get('/rooms', [LiveRoomController::class, 'index'])->name('rooms.index');
        Route::get('/rooms/{room}', [LiveRoomController::class, 'show'])->name('rooms.show');
        
        Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/my-account', [MyAccountController::class, 'index'])->name('myaccount.index');
        Route::get('/whishlist', [ShopController::class, 'whishlist'])->name('shop.wishlist');
        Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
        Route::get('/detail', [ShopController::class, 'detail'])->name('shop.detail');
       
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');


        Route::get('/loja', function () {
            return view('pages-under_development');
        })->name('loja.index');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/cockpit', [CockpitController::class, 'index'])->name('cockpit.index');
        Route::get('/deals', [DealController::class, 'index'])->name('deals.index');
        Route::post('/deals', [DealController::class, 'index'])->name('deals.index');
        Route::get('/calendar', [CalendarController::class, 'index'])->name('page.calendar.index');
        Route::get('/economic_calendar', [PageController::class, 'economic_calendar'])->name('page.economic_calendar');
        Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::get('/usage_policy', [UsagePolicyController::class, 'index'])->name('usage_policy.index');

        Route::get('/suporte/index/{id?}', [TicketController::class, 'index_client'])->name('suporte.index');
        Route::post('/suporte/store', [TicketController::class, 'store_client'])->name('suporte.store');
        Route::get('/suporte/create', [TicketController::class, 'create_client'])->name('suporte.create');
        Route::get('/suporte/edit/{id}', [TicketController::class, 'edit_client'])->name('suporte.edit');
        Route::post('/suporte/reply', [TicketReplyController::class, 'store_client'])->name('suporte.reply');
        Route::post('/reply', [TicketReplyController::class, 'index'])->name('reply.index');
        Route::post('/ticket/image_upload', [TicketController::class, 'image_upload'])->name('ticket.image_upload');

        Route::post('/ticket_categories_qtd_client', [TicketController::class, 'ticket_categories_qtd_client'])->name('ticket.ticket_categories_qtd_client');
        Route::post('/ticket_status', [TicketController::class, 'ticket_status'])->name('ticket.ticket_status');

        Route::get('/user/profile', [UserController::class, 'profile'])->name('profile.show');
        Route::get('/user/profile/edit', [UserController::class, 'profile_edit'])->name('profile.edit');
        Route::put('/user/profile/update', [UserController::class, 'profile_update'])->name('profile.update');

        Route::get('/store', [StoreController::class, 'index'])->name('store.index');
        Route::get('/store/checkout', [StoreController::class, 'checkout'])->name('store.checkout');
        Route::get('/store/payment', [StoreController::class, 'payment'])->name('store.payment');
        Route::post('/charge', [ChargesController::class, 'create'])->name('charge.create');
        Route::get('/charge/list', [ChargesController::class, 'getCharges'])->name('charge.getcharge');


        Route::get('/cart', [CartController::class, 'viewCart'])->name('view.cart');
        Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
        Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

        Route::post('/storeOrder', [OrderController::class, 'store'])->name('order.store');
    });

    Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'], 'middleware' => ['permission:user|admin']], function () {
        Route::get('/status_copy', [StatusCopyController::class, 'index'])->name('status_copy.index');
        Route::get('/expert_advisor/index_config', [ExpertAdvisorController::class, 'index_config'])->name('expert_advisor.index_config');
        Route::get('/expert_advisor/close/{id}', [ExpertAdvisorController::class, 'close'])->name('expert_advisor.close');
        Route::get('/expert_advisor/close_cancel/{id}', [ExpertAdvisorController::class, 'close_cancel'])->name('expert_advisor.close_cancel');
        Route::get('/expert_advisor/pause/{id}', [ExpertAdvisorController::class, 'pause'])->name('expert_advisor.pause');
        Route::get('/expert_advisor/pause_cancel/{id}', [ExpertAdvisorController::class, 'pause_cancel'])->name('expert_advisor.pause_cancel');
    });
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'], 'middleware' => ['permission:admin']], function () {

    Route::get('/manage', [ManageController::class, 'index'])->name('manage.index');

    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');


    Route::get('/clientes', function () {
        return view('pages-under_development');
    })->name('clientes.index');

    Route::get('/order_error', [OrderErrorController::class, 'index'])->name('order_error.index');
    Route::get('/order_error/filtros', [OrderErrorController::class, 'filtros'])->name('order_error.filtros');

    Route::get('/conta_investimento.index', [AccountController::class, 'index_client'])->name('conta_investimento.index');
    Route::get('/conta_investimento/create', [AccountController::class, 'create_client'])->name('conta_investimento.create');
    Route::post('/conta_investimento/store', [AccountController::class, 'store_client'])->name('conta_investimento.store');
    Route::get('/conta_investimento/show/{id}', [AccountController::class, 'show_client'])->name('conta_investimento.show');

    Route::get('/ticket/index/{id?}', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticket/edit/status/{id}/{status}', [TicketController::class, 'status'])->name('ticket.status');
    Route::get('/ticket/edit/category/{id}/{category}', [TicketController::class, 'category'])->name('ticket.category');
    Route::post('/ticket_categories_qtd', [TicketController::class, 'ticket_categories_qtd'])->name('ticket.ticket_categories_qtd');

    Route::post('/ticket/reply', [TicketReplyController::class, 'store'])->name('ticket.reply');

    Route::get('/pagamento', [ChargesController::class, 'showPayments'])->name('pagamento.index');


    Route::get('/calendar_admin', [CalendarController::class, 'index_admin'])->name('calendar.index');

    Route::get('/expert_advisor', [ExpertAdvisorController::class, 'index'])->name('expert_advisor.index');
    Route::get('/expert_advisor/create', [ExpertAdvisorController::class, 'create'])->name('expert_advisor.create');
    //Route::get('/expert_advisor/list', [ExpertAdvisorController::class, 'list'])->name('expert_advisor.list');
    Route::post('/expert_advisor/store', [ExpertAdvisorController::class, 'store'])->name('expert_advisor.store');
    Route::patch('/expert_advisor/{id}', [ExpertAdvisorController::class, 'update'])->name('expert_advisor.update');
    Route::get('/expert_advisor/destroy/{id}', [ExpertAdvisorController::class, 'destroy'])->name('expert_advisor.destroy');
    Route::get('/expert_advisor/edit/{id}', [ExpertAdvisorController::class, 'edit'])->name('expert_advisor.edit');
    Route::get('/expert_advisor/show/{id}', [ExpertAdvisorController::class, 'show'])->name('expert_advisor.show');

    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
    Route::get('/account/list', [AccountController::class, 'list'])->name('account.list');
    Route::post('/account', [AccountController::class, 'store'])->name('account.store');
    Route::patch('/account/{id}', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/destroy/{id}', [AccountController::class, 'destroy'])->name('account.destroy');
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('account.edit');
    Route::get('/account/show/{id}', [AccountController::class, 'show'])->name('account.show');

    Route::get('/broker', [BrokerController::class, 'index'])->name('broker.index');
    Route::get('/broker/create', [BrokerController::class, 'create'])->name('broker.create');
    //Route::get('/broker/list', [BrokerController::class, 'list'])->name('broker.list');
    Route::post('/broker/store', [BrokerController::class, 'store'])->name('broker.store');
    Route::patch('/broker/{id}', [BrokerController::class, 'update'])->name('broker.update');
    Route::get('/broker/destroy/{id}', [BrokerController::class, 'destroy'])->name('broker.destroy');
    Route::get('/broker/edit/{id}', [BrokerController::class, 'edit'])->name('broker.edit');
    Route::get('/broker/show/{id}', [BrokerController::class, 'show'])->name('broker.show');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer/grid', [CustomerController::class, 'grid'])->name('customer_grid.index');
    Route::get('/customer/list', [CustomerController::class, 'list'])->name('customer.list');
    Route::get('/customer/profile/{id}', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::patch('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customer/editProfile/{id}', [CustomerController::class, 'editProfile'])->name('customer.editProfile');

    Route::get('/faq_admin', [FaqController::class, 'index_admin'])->name('faq.index_admin');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::patch('/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/faq/destroy/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::get('/faq/show/{id}', [FaqController::class, 'show'])->name('faq.show');

    Route::get('/faq_category', [FaqCategoryController::class, 'index'])->name('faq_category.index');
    Route::get('/faq_category/create', [FaqCategoryController::class, 'create'])->name('faq_category.create');
    Route::post('/faq_category/store', [FaqCategoryController::class, 'store'])->name('faq_category.store');
    Route::patch('/faq_category/{id}', [FaqCategoryController::class, 'update'])->name('faq_category.update');
    Route::get('/faq_category/destroy/{id}', [FaqCategoryController::class, 'destroy'])->name('faq_category.destroy');
    Route::get('/faq_category/edit/{id}', [FaqCategoryController::class, 'edit'])->name('faq_category.edit');
    Route::get('/faq_category/show/{id}', [FaqCategoryController::class, 'show'])->name('faq_category.show');

    Route::get('/license', [LicenseController::class, 'index'])->name('license.index');
    Route::get('/license/create', [LicenseController::class, 'create'])->name('license.create');
    Route::post('/license', [LicenseController::class, 'store'])->name('license.store');
    Route::patch('/license/{id}', [LicenseController::class, 'update'])->name('license.update');
    Route::get('/license/destroy/{id}', [LicenseController::class, 'destroy'])->name('license.destroy');
    Route::get('/license/edit/{id}', [LicenseController::class, 'edit'])->name('license.edit');
    Route::get('/license/show/{id}', [LicenseController::class, 'show'])->name('license.show');

    Route::get('/usage_policy_admin', [UsagePolicyController::class, 'index_admin'])->name('usage_policy.index_admin');
    Route::get('/usage_policy/create', [UsagePolicyController::class, 'create'])->name('usage_policy.create');
    Route::post('/usage_policy/store', [UsagePolicyController::class, 'store'])->name('usage_policy.store');
    Route::patch('/usage_policy/{id}', [UsagePolicyController::class, 'update'])->name('usage_policy.update');
    Route::get('/usage_policy/destroy/{id}', [UsagePolicyController::class, 'destroy'])->name('usage_policy.destroy');
    Route::get('/usage_policy/edit/{id}', [UsagePolicyController::class, 'edit'])->name('usage_policy.edit');
    Route::get('/usage_policy/show/{id}', [UsagePolicyController::class, 'show'])->name('usage_policy.show');

    Route::get('/usage_policy_category', [UsagePolicyCategoryController::class, 'index'])->name('usage_policy_category.index');
    Route::get('/usage_policy_category/create', [UsagePolicyCategoryController::class, 'create'])->name('usage_policy_category.create');
    Route::post('/usage_policy_category/store', [UsagePolicyCategoryController::class, 'store'])->name('usage_policy_category.store');
    Route::patch('/usage_policy_category/{id}', [UsagePolicyCategoryController::class, 'update'])->name('usage_policy_category.update');
    Route::get('/usage_policy_category/destroy/{id}', [UsagePolicyCategoryController::class, 'destroy'])->name('usage_policy_category.destroy');
    Route::get('/usage_policy_category/edit/{id}', [UsagePolicyCategoryController::class, 'edit'])->name('usage_policy_category.edit');
    Route::get('/usage_policy_category/show/{id}', [UsagePolicyCategoryController::class, 'show'])->name('usage_policy_category.show');

    //admin
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    //Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

    //store


    Route::get('/store_company', [StoreCompanyController::class, 'index'])->name('store_company.index');
    Route::get('/store_company/create', [StoreCompanyController::class, 'create'])->name('store_company.create');
    Route::post('/store_company/store', [StoreCompanyController::class, 'store'])->name('store_company.store');
    Route::patch('/store_company/{id}', [StoreCompanyController::class, 'update'])->name('store_company.update');
    Route::get('/store_company/destroy/{id}', [StoreCompanyController::class, 'destroy'])->name('store_company.destroy');
    Route::get('/store_company/edit/{id}', [StoreCompanyController::class, 'edit'])->name('store_company.edit');
    Route::get('/store_company/show/{id}', [StoreCompanyController::class, 'show'])->name('store_company.show');

    Route::get('/store_trader', [StoreTraderController::class, 'index'])->name('store_trader.index');
    Route::get('/store_trader/create', [StoreTraderController::class, 'create'])->name('store_trader.create');
    Route::post('/store_trader/store', [StoreTraderController::class, 'store'])->name('store_trader.store');
    Route::patch('/store_trader/{id}', [StoreTraderController::class, 'update'])->name('store_trader.update');
    Route::get('/store_trader/destroy/{id}', [StoreTraderController::class, 'destroy'])->name('store_trader.destroy');
    Route::get('/store_trader/edit/{id}', [StoreTraderController::class, 'edit'])->name('store_trader.edit');
    Route::get('/store_trader/show/{id}', [StoreTraderController::class, 'show'])->name('store_trader.show');

    // supervisor
    Route::get('/supervisor_group', [SupervisorGroupController::class, 'index'])->name('supervisor_group.index');
    Route::get('/supervisor_group/create', [SupervisorGroupController::class, 'create'])->name('supervisor_group.create');
    Route::post('/supervisor_group/store', [SupervisorGroupController::class, 'store'])->name('supervisor_group.store');
    Route::patch('/supervisor_group/{id}', [SupervisorGroupController::class, 'update'])->name('supervisor_group.update');
    Route::get('/supervisor_group/destroy/{id}', [SupervisorGroupController::class, 'destroy'])->name('supervisor_group.destroy');
    Route::get('/supervisor_group/edit/{id}', [SupervisorGroupController::class, 'edit'])->name('supervisor_group.edit');
    Route::get('/supervisor_group/show/{id}', [SupervisorGroupController::class, 'show'])->name('supervisor_group.show');

    Route::get('/supervisor_group_expert', [SupervisorGroupExpertController::class, 'index'])->name('supervisor_group_expert.index');
    Route::get('/supervisor_group_expert/create', [SupervisorGroupExpertController::class, 'create'])->name('supervisor_group_expert.create');
    Route::post('/supervisor_group_expert/store', [SupervisorGroupExpertController::class, 'store'])->name('supervisor_group_expert.store');
    Route::patch('/supervisor_group_expert/{id}', [SupervisorGroupExpertController::class, 'update'])->name('supervisor_group_expert.update');
    Route::get('/supervisor_group_expert/destroy/{id}', [SupervisorGroupExpertController::class, 'destroy'])->name('supervisor_group_expert.destroy');
    Route::get('/supervisor_group_expert/edit/{id}', [SupervisorGroupExpertController::class, 'edit'])->name('supervisor_group_expert.edit');
    Route::get('/supervisor_group_expert/show/{id}', [SupervisorGroupExpertController::class, 'show'])->name('supervisor_group_expert.show');

    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor.index');
    Route::get('/supervisor/create', [SupervisorController::class, 'create'])->name('supervisor.create');
    Route::post('/supervisor/store', [SupervisorController::class, 'store'])->name('supervisor.store');
    Route::patch('/supervisor/{id}', [SupervisorController::class, 'update'])->name('supervisor.update');
    Route::get('/supervisor/destroy/{id}', [SupervisorController::class, 'destroy'])->name('supervisor.destroy');
    Route::get('/supervisor/edit/{id}', [SupervisorController::class, 'edit'])->name('supervisor.edit');
    Route::get('/supervisor/show/{id}', [SupervisorController::class, 'show'])->name('supervisor.show');

    Route::get('/supervisor_group_member', [SupervisorGroupMemberController::class, 'index'])->name('supervisor_group_member.index');
    Route::get('/supervisor_group_member/create', [SupervisorGroupMemberController::class, 'create'])->name('supervisor_group_member.create');
    Route::post('/supervisor_group_member/store', [SupervisorGroupMemberController::class, 'store'])->name('supervisor_group_member.store');
    Route::patch('/supervisor_group_member/{id}', [SupervisorGroupMemberController::class, 'update'])->name('supervisor_group_member.update');
    Route::get('/supervisor_group_member/destroy/{id}', [SupervisorGroupMemberController::class, 'destroy'])->name('supervisor_group_member.destroy');
    Route::get('/supervisor_group_member/edit/{id}', [SupervisorGroupMemberController::class, 'edit'])->name('supervisor_group_member.edit');
    Route::get('/supervisor_group_member/show/{id}', [SupervisorGroupMemberController::class, 'show'])->name('supervisor_group_member.show');
});
