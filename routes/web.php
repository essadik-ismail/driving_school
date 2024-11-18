<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

require 'auth.php';


Route::view('/pos', 'pages.pos.index');