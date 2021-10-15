<?php

namespace App\Http\Controllers;

use App\Services\GetCourseCurrency;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getCourse(Request $request) {
        return resolve(GetCourseCurrency::class)->start($request->currency, $request->date);
    }
}
