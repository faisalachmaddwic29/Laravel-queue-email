<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = User::all();
        foreach ($data as $user) {
            Log::debug("Before Disptach " . $user->name);
            dispatch(new CustomerJob($user));
        }

        // dd('Email has been delivered');
    }
}
