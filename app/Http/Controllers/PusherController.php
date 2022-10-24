<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function __invoke()
    {
        event(new PusherBroadcast('hello world'));

        return view('welcome');
    }
}
