<?php

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
//    phpinfo();
//
//    $pdfFile = file_get_contents(storage_path('app/Test.pdf'));
//    $keyFile = file_get_contents(storage_path('app/key.jks'));
//    $password = 'zZ383026';
//    $code = 0;
//
//    $iErrorCode = 0;
//    $iResult = euspe_init($iErrorCode);
//    $iErrorCode1 = 0;
//    euspe_enumjksprivatekeys(
//        $keyFile, strlen($keyFile), $password, $code
//    );
//
//
//
//    $message = '';
//    euspe_geterrdescr($code, $message);
//    echo mb_detect_encoding($message);
//    dd($message);
//
//
//    euspe_finalize();
    return view('upload');
});


Route::post('upload-pdf', function (Request $request) {
    $pdfFile = $request->file('file_pdf');
    $password = $request->get('password');

    $keyPath = 'key.jks';
    $keyByteString = file_get_contents(Storage::disk('local')->path($keyPath), FILE_BINARY);
    $pdfSignPath = storage_path('File-signed1111222222.pdf');

//    $fileName = uniqid('pdf_') . '.' . $pdfFile->getClientOriginalExtension();
//    $pdfPath = $pdfFile->storeAs('', $fileName, 'public');
//
//dd($pdfPath);

    $iErrorCode = 0;
    euspe_setruntimeparameter(EU_RESOLVE_OIDS_PARAMETER, false, $iErrorCode);
    euspe_setruntimeparameter(EU_SIGN_TYPE_PARAMETER, EU_SIGN_TYPE_CADES_X_LONG, $iErrorCode);

    // Загрузка ключа
    euspe_readprivatekeybinary(
        $keyByteString, $password, $iErrorCode
    );

    $pdfTempFile = Storage::disk('local')->path(uniqid('pdf_') . 'temp.pdf');
    file_put_contents($pdfTempFile, file_get_contents($pdfFile->getRealPath()));
    $bExternal = false;
    euspe_signfile(
        $pdfTempFile,        // Вхідний. Ім’я файлу з даними
        $pdfSignPath,   // Вхідний. Ім’я файлу, в який необхідно записати підпис (якщо тип підпису зовнішній) або підписані дані (якщо тип підпису внутрішній)
        $bExternal,        // Вхідний. Тип ЕЦП (зовнішний або внутрішній)
        $iErrorCode        // Вихідний. Код помилки
    );
dd($iErrorCode);
//    unlink($pdfTempFile);

    $headers = array(
        'Content-Type: application/pdf',
    );
    return response()->download($pdfSignPath, 'File-signed111111111111111111122222222222.pdf', $headers);
})->name('upload-pdf');