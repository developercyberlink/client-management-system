<?php

use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\AdminBankDetailsController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorSizeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductDetailImageController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\InvoiceAnalysisController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseBillController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\User\UserInvoiceController;
use App\Http\Controllers\User\UserInquiryController;
use App\Http\Controllers\User\UserTaskController;
use App\Http\Controllers\UserTaskManageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\ProgrammingTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InquiryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('admin')->group(function(){
    Route::name('admin.')->group(function(){

        // Authentication Routes
        Route::prefix('')->group(function () {
            Route::controller(LoginController::class)->group(function () {
                Route::name('')->group(function () {
                    Route::get('/login','showLoginForm')->name('login');
                    Route::post('/login', 'login')->name('login.submit');
                    Route::get('/logout', 'logout')->name('logout');
                });
            });
        });

        //<---- Frontend Routes ---->

        Route::prefix('')->group(function () {
            Route::controller(FrontController::class)->group(function () {
                Route::name('')->group(function () {
                    Route::get('/', 'index')->name('index');
                });
            });
        });

        // Admin management Routes
        Route::prefix('adminmanage')->group(function () {
            Route::controller(AdminManagementController::class)->group(function () {
                Route::name('adminmanage.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/modifypermission', 'modifyPermission')->name('modifypermission');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/register', 'register')->name('register');
                     Route::get('/view/{id}', 'view')->name('view');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');                    
                });
            });
        });

        // Admin Bank Details
         Route::prefix('adminmanage-details')->group(function () {
            Route::controller(AdminBankDetailsController::class)->group(function () {
                Route::name('adminmanage-details.')->group(function () {                                 
                    Route::post('/update', 'update')->name('update');                
                });
            });
        });

          // Admin Documents
         Route::prefix('adminmanage-documents')->group(function () {
            Route::controller(AdminDocumentController::class)->group(function () {
                Route::name('adminmanage-documents.')->group(function () {                                 
                   Route::post('/store', 'store')->name('store');                                
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');    
                                      
                });
            });
        });


        // Category Controller
        Route::prefix('category')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::name('category.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{slug}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{slug}', 'delete')->name('delete');
                });
            });
        });

        // Task Controller
        Route::prefix('task')->group(function () {
            Route::controller(TaskController::class)->group(function () {
                Route::name('task.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/manage/{id}', 'manage')->name('manage');
                    Route::get('/updatestatus/{id}', 'updateStatus')->name('updatestatus');
                    Route::post('/markcomplete', 'markComplete')->name('markcomplete');
                    Route::post('/sendremark', 'sendRemark')->name('sendremark');
                    Route::post('/createusertask', 'createUserTask')->name('createusertask');
                    Route::post('/transfer', 'transfer')->name('transfer');
                });
            });
        });

        // SubCategory Controller
        Route::prefix('subcategory')->group(function () {
            Route::controller(SubCategoryController::class)->group(function () {
                Route::name('subcategory.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{slug}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{slug}', 'delete')->name('delete');
                });
            });
        });

        // Product Controller
        Route::prefix('product')->group(function () {
            Route::controller(ProductController::class)->group(function () {
                Route::name('product.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{slug}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{slug}', 'delete')->name('delete');
                });
            });
        });

        // Newsletter Controller
        Route::prefix('newsletter')->group(function () {
            Route::controller(NewsletterController::class)->group(function () {
                Route::name('newsletter.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/send', 'sendNewsletter')->name('send');
                    Route::get('/detail/{id}', 'detail')->name('detail');
                });
            });
        });

        // Product Detail Controller
        Route::prefix('productdetail')->group(function () {
            Route::controller(ProductDetailController::class)->group(function () {
                Route::name('productdetail.')->group(function () {
                    Route::get('/index/{slug}', 'index')->name('index');
                    Route::get('/add/{slug}', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{slug}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::post('/delete', 'delete')->name('delete');
                });
            });
        });

        // Product Controller
        Route::prefix('productdetailimage')->group(function () {
            Route::controller(ProductDetailImageController::class)->group(function () {
                Route::name('productdetailimage.')->group(function () {
                    Route::post('/create', 'create')->name('create');
                    Route::post('/update', 'update')->name('update');
                    Route::post('/delete', 'delete')->name('delete');
                });
            });
        });

        // Color Size Controller
        Route::prefix('colorsize')->group(function () {
            Route::controller(ColorSizeController::class)->group(function () {
                Route::name('colorsize.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{name}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{name}', 'delete')->name('delete');
                });
            });
        });

        // User Task Manage Controller
        Route::prefix('usertask')->group(function () {
            Route::controller(UserTaskManageController::class)->group(function () {
                Route::name('usertask.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/single/{id}', 'single')->name('single');
                    Route::post('/markcomplete', 'markComplete')->name('markcomplete');
                    Route::get('/feedback/{id}', 'feedback')->name('feedback');
                    Route::post('/pushfeedback', 'pushFeedback')->name('pushfeedback');
                });
            });
        });  

        // User Activity Controller 
        Route::prefix('clients')->group(function () {
            Route::controller(UserActivityController::class)->group(function () {
                Route::name('clients.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');
                    Route::get('/details/{id}', 'details')->name('details');
                    Route::post('/contacts', 'contacts')->name('contacts');
                    Route::get('/contacts/{id}', 'contactsdelete')->name('contactsdelete');
                    Route::post('/services', 'services')->name('services');
                    Route::get('/service-edit/{id}', 'service_edit')->name('serviceedit');
                    Route::post('/service-update', 'service_update')->name('serviceupdate');
                    Route::get('/services/{id}', 'servicedelete')->name('servicedelete');
                    Route::get('/service-invoice/{id}', 'generate_invoice')->name('generate-invoice');
                    Route::post('/documents', 'documents')->name('documents');
                    Route::get('/documents/{id}', 'documentsDelete')->name('documentsdelete');
                });
            });
        });

        // Service Controller
        Route::prefix('service')->group(function () {
            Route::controller(ServiceController::class)->group(function () {
                Route::name('service.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');
                });
            });
        });

        // ServiceType Controller
        Route::prefix('service-type')->group(function () {            
            Route::controller(ServiceTypeController::class)->group(function () {
                Route::name('service-type.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');
                });
            });
        });

        // ProgrammingType Controller
        Route::prefix('programming-type')->group(function () {            
            Route::controller(ProgrammingTypeController::class)->group(function () {
                Route::name('programming-type.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::post('/store', 'store')->name('store');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/{id}', 'destroy')->name('destroy');   
                });
            });
        });

        // Invoice controller
        Route::prefix('invoice')->group(function () { 
            Route::controller(InvoiceController::class)->group(function () {
                Route::name('invoice.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                     Route::get('/view/{id}', 'view')->name('view');
                    Route::get('/edit/{invoice_no}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{invoice_no}', 'delete')->name('delete');
                    //export in pdf
                    Route::get('/pdf/{invoice_no}','export')->name('pdf');
                    //send to mail
                    Route::get('/invoice_email/{invoive_no}','email')->name('email');
                });
            });
        });

        // Invoice Analysis controller
        Route::prefix('invoiceanalysis')->group(function () {
            Route::controller(InvoiceAnalysisController::class)->group(function () {
                Route::name('invoiceanalysis.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/allfiscaltotal', 'allFiscalTotal')->name('allfiscaltotal');
                    Route::post('/fiscaldata', 'fiscalData')->name('fiscaldata');
                });
            });
        });

        // Inquiry controller
        Route::prefix('inquiry')->group(function () {
            Route::controller(InquiryController::class)->group(function () {
                Route::name('inquiry.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/single/{id}', 'single')->name('single');
                    Route::post('/reply', 'reply')->name('reply');
                    Route::get('/markorder/{id}', 'markOrder')->name('markorder');
                });
            });
        });

        // Order controller
        Route::prefix('order')->group(function () {
            Route::controller(OrderController::class)->group(function () {
                Route::name('order.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/single/{id}', 'single')->name('single');
                });
            });
        });

        // Vendor controller
        Route::prefix('vendor')->group(function () {
            Route::controller(VendorController::class)->group(function () {
                Route::name('vendor.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::post('/createimmediate', 'createImmediate')->name('createimmediate');
                    Route::get('/edit/{pan}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{pan}', 'delete')->name('delete');
                });
            });
        });

        // Purchase Bill controller
        Route::prefix('purchasebill')->group(function () {
            Route::controller(PurchaseBillController::class)->group(function () {
                Route::name('purchasebill.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/add', 'add')->name('add');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/edit/{bill_no}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/delete/{bill_no}', 'delete')->name('delete');
                });
            });
        });

    });
});

/*Route::prefix('user')->group(function(){
    Route::name('user.')->group(function(){
        Route::prefix('')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::name('')->group(function () {
                    Route::get('/', 'index')->name('index');
                });
            });
        });
    });
});*/

Route::group(['prefix' => 'user', 'middleware'=>['web', 'verified']], function () {
    Route::name('user.')->group(function(){

        Route::controller(UserController::class)->group(function () {
            Route::name('')->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });

        // User Task Controller
        Route::prefix('task')->group(function () {
            Route::controller(UserTaskController::class)->group(function () {
                Route::name('task.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/feedback/{id}', 'feedback')->name('feedback');
                    Route::post('/pushfeedback', 'pushFeedback')->name('pushfeedback');
                });
            });
        });

        // User Inovice Controller
        Route::prefix('invoice')->group(function () {
            Route::controller(UserInvoiceController::class)->group(function () {
                Route::name('invoice.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/single/{invoice_no}', 'single')->name('single');
                });
            });
        });

        // User Inquiry Controller
        Route::prefix('inquiry')->group(function () {
            Route::controller(UserInquiryController::class)->group(function () {
                Route::name('inquiry.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/create', 'create')->name('create');
                    Route::get('/markorder/{id}', 'markOrder')->name('markorder');
                });
            });
        });


    });
});

Route::prefix('')->group(function(){
    Route::name('')->group(function(){
        Route::prefix('')->group(function () {
            Route::controller(PageController::class)->group(function () {
                Route::name('')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post("/search", 'search')->name('search');
                });
            });
        });
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
// Auth verification link
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('user.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
