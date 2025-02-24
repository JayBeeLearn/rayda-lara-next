<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['App Provider'=> 'Rayda-Lara-Next-JayBee', 'URL'=>'localhost:3000']);
});
