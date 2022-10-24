<?php

namespace App\Http\Controllers\Pusher;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke(): View|Factory|Application
    {
        return view('index');
    }
}
