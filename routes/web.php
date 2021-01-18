<?php

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

// user : route

/* Home */
Route::get('/', 'PageController@home')->name('home');

Route::post('/', 'MailController@customer_regis_receive_mail')->name('mail_customer');

/* Sub Pages */
Route::get('/error', function () {
    return view('user.sub_pages.error');
})->name('error');

Route::get('/success', function () {
    return view('user.sub_pages.success');
})->name('success');

Route::get('/success', function () {
    return view('user.sub_pages.success_2');
})->name('success2');

Route::get('/get-involved', function () {
    return view('user.sub_pages.get_involved');
})->name('get_involed');

/* 1.Services */
Route::get('/services', function () {
    return view('user.services.services');
})->name('services');

Route::get('/rescue-form', function () {
    return view('user.services.rescue_form');
})->name('rescue_form');

Route::post('/rescue_form', 'SendMailController@report_send')->name('report_send');

Route::get('/adoption', 'PetController@pet_list_adoption')->name('pet_list_adoption');

Route::get('/adoption/{slug}', 'PetController@pet_detail_adoption')->name('adoption_detail');

Route::get('/adoption/adoption-form/{slug}', 'PetController@adoption_form_fill')->name('adoption_form');

Route::post('/adoption/adoption-form/{slug}', 'OrderController@form_send')->name('adoption_form_send');

Route::get('/concession-form', function () {
    return view('user.services.concession_form');
})->name('concession_form');

Route::post('/concession-form', 'PageController@concessionP')->name('concession_formP');

Route::get('/volunteer', function () {
    return view('user.services.volunteer');
})->name('volunteer');

/* 2.Store */
Route::get('/shop', function () {
    return view('user.store.shop');
});

Route::get('/pet-care', function () {
    return view('user.store.pet_care');
});


/* 3.Blog */
Route::get('/news', 'NewController@news_list_data')->name('news');

Route::get('/news/{Slug}', 'NewController@single_new_data')->name('single_new');

/* 4.About */
Route::get('/about', function () {
    return view('user.about.about');
})->name('about');

Route::get('/team', function () {
    return view('user.about.team');
})->name('team');

/* 5.Contact */
Route::get('/contact', function () {
    return view('user.contact.contact');
})->name('contact');

Route::get('/mail-send', 'SendMailController@sendMail');

Route::post('/mail-send_post', 'SendMailController@sendMail')->name('send_contact_mail');

/* 6.Donation */
Route::get('/donation', function () {
    return view('user.donation.donation');
})->name('get_donation');

Route::post('/donation', 'DonationController@store')->name('donation');

Route::get('/foster', function () {
    $news = \App\News::all()->take(3);
//    dd($news);
    return view('user.foster', compact('news'));
})->name('foster');

/* 7.Account */

Route::get('/login-register', function () {
    return view('user.account.login_register');
})->name('login_register');

Route::post('/login', 'AccountController@loginP')->name('loginP');

Route::post('/logout', 'AccountController@logOut')->name('logout');

Route::post('/register', 'AccountController@registerP')->name('register');

/* 404 */

Route::get('/404-page', function () {
    return view('user.sub_pages.error');
})->name('404');

Route::group(['prefix' => '/account'], function () {
    Route::get('/personal-info', 'PersonalInfoController@account_data')->name('personal_info');
    Route::post('/personal-info-update', 'PersonalInfoController@account_update')->name('personal_info_update');
    Route::get('/{Slug}/change-password', 'PersonalInfoController@change_password')->name('user_account_change_password');
    Route::put('/{Slug}/change-password', 'PersonalInfoController@change_passwordP')->name('user_change_password');
    Route::get('/{Slug}/update-timeline', 'PersonalInfoController@update_timeline')->name('user_account_update_timeline');
    Route::post('/{Slug}/update-timeline', 'PersonalInfoController@update_timelineP')->name('user_update_timeline');
});

//Route::get('/regist', 'AccountController@regist');
//Route::post('/regist', 'AccountController@registP');

// admin : login

Route::post('/admin-login', 'AccountController@admin_loginP')->name('logIn');

// admin : route

Route::group(['middleware' => ['role_check'], 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@dashboard')->name('admin_home');

    Route::get('/404', function () {
        return view('admin.404-admin');
    })->name('admin_404');

    Route::group(['prefix' => '/accounts'], function () {
        Route::get('/', 'AccountController@list')->name('admin_account_list');
        Route::get('/create', 'AccountController@create')->name('admin_account_create');
        Route::post('/store', 'AccountController@store')->name('admin_account_store');
        Route::get('/edit/{slug}', 'AccountController@edit')->name('admin_account_edit');
        Route::get('/detail/{slug}', 'AccountController@detail')->name('admin_account_detail');
        Route::put('/update/{slug}', 'AccountController@update')->name('admin_account_update');
        Route::put('/deactive/{id}', 'AccountController@deactive')->name('admin_account_deactive');
        Route::put('/active/{id}', 'AccountController@active')->name('admin_account_active');
        Route::put('/deactiveAll', 'AccountController@deactive_multi')->name('admin_account_deactive_multi');
        Route::put('/activeAll', 'AccountController@active_multi')->name('admin_account_active_multi');
        Route::get('/password/{slug}', 'AccountController@change_password')->name('admin_account_change_password');
        Route::put('/password/{slug}', 'AccountController@change_passwordP')->name('admin_change_password');
    });

    Route::group(['prefix' => '/pets'], function () {
        Route::get('/', 'PetController@list')->name('admin_pet_list');
        Route::get('/create', 'PetController@create')->name('admin_pet_create');
        Route::post('/store', 'PetController@store')->name('admin_pet_store');
        Route::get('/edit/{slug}', 'PetController@edit')->name('admin_pet_edit');
        Route::get('/detail/{slug}', 'PetController@detail')->name('admin_pet_detail');
        Route::put('/update/{slug}', 'PetController@update')->name('admin_pet_update');
        Route::put('/deactive/{id}', 'PetController@deactive')->name('admin_pet_deactive');
        Route::put('/active/{id}', 'PetController@active')->name('admin_pet_active');
        Route::put('/deactiveAll', 'PetController@deactive_multi')->name('admin_pet_deactive_multi');
        Route::put('/activeAll', 'PetController@active_multi')->name('admin_pet_active_multi');
    });

    Route::group(['prefix' => '/contracts'], function () {
        Route::get('/', 'ContractController@list')->name('admin_contract_list');
        Route::get('/create', 'ContractController@create')->name('admin_contract_create');
        Route::post('/store', 'ContractController@store')->name('admin_contract_store');
//        Route::get('/edit/{id}', 'ContractController@edit')->name('admin_contract_edit');
        Route::get('/detail/{id}', 'ContractController@detail')->name('admin_contract_detail');
//        Route::put('/update/{id}', 'ContractController@update')->name('admin_contract_update');
        Route::put('/deactive/{id}', 'ContractController@end')->name('admin_contract_end');
        Route::put('/active/{id}', 'ContractController@start')->name('admin_contract_start');
//        Route::put('/deactiveAll', 'ContractController@deactive_multi')->name('admin_contract_deactive_multi');
//        Route::put('/activeAll', 'ContractController@active_multi')->name('admin_contract_active_multi');
    });

    Route::group(['prefix' => '/orders'], function () {
        Route::get('/', 'OrderController@list')->name('admin_order_list');
        Route::get('/create', 'OrderController@create')->name('admin_order_create');
        Route::post('/store', 'OrderController@store')->name('admin_order_store');
        Route::get('/edit/{id}', 'OrderController@edit')->name('admin_order_edit');
        Route::get('/detail/{id}', 'OrderController@detail')->name('admin_order_detail');
        Route::put('/update/{id}', 'OrderController@update')->name('admin_order_update');
        Route::post('/acept/{id}', 'OrderController@acept')->name('admin_order_acept');
        Route::post('/decline/{id}', 'OrderController@decline')->name('admin_order_decline');
//        Route::put('/deactiveAll', 'OrderController@deactive_multi')->name('admin_order_deactive_multi');
//        Route::put('/activeAll', 'OrderController@active_multi')->name('admin_order_active_multi');
    });

    Route::group(['prefix' => '/news'], function () {
        Route::get('/', 'NewController@list')->name('admin_new_list');
        Route::get('/create', 'NewController@create')->name('admin_new_create');
        Route::post('/store', 'NewController@store')->name('admin_new_store');
        Route::get('/edit/{slug}', 'NewController@edit')->name('admin_new_edit');
        Route::get('/detail/{slug}', 'NewController@detail')->name('admin_new_detail');
        Route::put('/update/{slug}', 'NewController@update')->name('admin_new_update');
        Route::put('/deactive/{id}', 'NewController@deactive')->name('admin_new_deactive');
        Route::put('/active/{id}', 'NewController@active')->name('admin_new_active');
        Route::put('/deactiveAll', 'NewController@deactive_multi')->name('admin_new_deactive_multi');
        Route::put('/activeAll', 'NewController@active_multi')->name('admin_new_active_multi');
    });

    Route::group(['prefix' => '/reports'], function () {
        Route::get('/', 'ReportController@list')->name('admin_report_list');
        Route::get('/create', 'ReportController@create')->name('admin_report_create');
        Route::post('/store', 'ReportController@store')->name('admin_report_store');
        Route::get('/edit/{slug}', 'ReportController@edit')->name('admin_report_edit');
        Route::get('/detail/{slug}', 'ReportController@detail')->name('admin_report_detail');
        Route::put('/update/{slug}', 'ReportController@update')->name('admin_report_update');
        Route::put('/update-pet/{slug}', 'ReportController@pet_update')->name('admin_report_pet_update');
        Route::post('/report-new', 'ReportController@report_new')->name('create_admin_report_new');
        Route::put('/handle/{id}', 'ReportController@handle')->name('admin_report_handle');
        Route::put('/done/{id}', 'ReportController@done')->name('admin_report_done');
        Route::put('/aceptAll', 'ReportController@acept_multi')->name('admin_report_acept_multi');
        Route::put('/declineAll', 'ReportController@decline_multi')->name('admin_report_decline_multi');
        Route::put('/doneAll', 'ReportController@done_multi')->name('admin_report_done_multi');
        Route::post('/edit/pet-store', 'PetController@pet_store')->name('admin_report_pet_store');
    });
});

Route::get('/test', function () {
    return view('admin.test');
});
// test : route
Route::get('checking_page', function () {
    return view('session_checking');
});
Route::get('/test-sms-Nexom', 'SmsController@Nexom_SmS');
Route::get('/test-toaster', function () {
    return view('test-toaster');
});
/* Admin Login */
Route::get('/admin-login', function () {
    return view('admin.login_register');
})->name('admin-login');

/* Admin Logout */
Route::get('/logOut', 'AccountController@logOut')->name('logOut');


/* Timeline */
Route::get('/timeline', function () {
    return view('timeline');
});
