<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tweet $tweet)
    {
        return Inertia::render('Tweet/Show', [
            'tweet' => TweetResource::make($tweet->load('user')),
            'comments' => CommentResource::collection($tweet->comments()->with('user')->latest()->paginate()),
        ]);
    }
}
