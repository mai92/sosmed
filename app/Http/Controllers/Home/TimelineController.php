<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Home/Timeline', [
            'tweets' => TweetResource::collection(
                Tweet::with('user')
                    ->withCount('comments')
                    ->latest()
                    ->paginate(10)
            ),
        ]);
    }
}
