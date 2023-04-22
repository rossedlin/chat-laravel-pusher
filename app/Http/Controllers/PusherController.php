<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('index');
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function broadcast(Request $request): View|Factory|Application
    {
        $message = $request->get('message') ?? 'You wrote a blank message';

        broadcast(new PusherBroadcast($message))->toOthers();

        return view('right', [
            'timestamp' => date('H:i'),
            'message'   => $message,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function message(Request $request): View|Factory|Application
    {
        return view('left', [
            'timestamp' => date('H:i'),
            'message'   => $request->get('message'),
        ]);
    }
}
