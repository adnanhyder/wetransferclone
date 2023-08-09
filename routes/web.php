<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Mail\CustomEmail;

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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/setting', [UserController::class, 'viewlimt'])->middleware(['auth', 'verified'])->name('setting');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/upload', [UploadController::class, 'upload']);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::post('/save_limit', [UserController::class, 'save_limit'])->name('save_limit');




Route::get('/email-form', function () {
    return view('email_form');
});


Route::post('/send-email', function (Request $request) {
    $email = $request->email;

    
    
    // Assuming you have the download link stored in a variable called $downloadLink
$downloadLink = $request->message;

// HTML content for the email
$message = '<html>
<head>
    <title>Download Link</title>
</head>
<body>
    <h1>Hello!</h1>
    <p>Click the button below to download the file:</p>
    <a href="'.$downloadLink.'" target="_blank" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Download Now</a>
</body>
</html>';

$headers = "From: sender@uploadeasy.salebanks.com\r\n";
$headers .= "Reply-To: sender@uploadeasy.salebanks.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$email = $email; 

$mailSent = mail($email, 'File Link', $message, $headers);

if ($mailSent) {
    return redirect()->back()->with('message', 'Email sent successfully!');
} else {
    return "Email not sent successfully!";
}

})->name('send.email');
