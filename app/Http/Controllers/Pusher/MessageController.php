<?php

namespace App\Http\Controllers\Pusher;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $request->get('message'),
            'html'    => view('left', [
                'timestamp' => date('H:i'),
                'message'   => $request->get('message'),
            ])->render(),
        ]);
    }
}
