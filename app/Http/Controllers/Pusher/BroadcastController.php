<?php

namespace App\Http\Controllers\Pusher;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $message = $request->get('message') ?? 'You wrote a blank message';

        event(new PusherBroadcast($message));

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
}
