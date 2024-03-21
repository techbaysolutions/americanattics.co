<?php


use App\Http\Controllers\Api\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/send-email', [EmailController::class, 'index']);
Route::fallback(function () {
    $metadata['outcome'] = "ERROR";
    $metadata['outcomeCode'] = "404";
    $metadata['numOfRecords'] = "0";
    $metadata['message'] = "URL not found";
    $records = array();
    $errors = array();

    return response()->json([
        '_metadata' => $metadata,
        'records' => $records,
        'errors' => $errors,
    ], 404);
});
