<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //TODO: temporário
   return file_get_contents('../docs/api-docs.html');
});
