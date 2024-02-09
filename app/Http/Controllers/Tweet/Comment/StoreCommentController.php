<?php

namespace App\Http\Controllers\Tweet\Comment;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Notifications\TweetCommented;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Tweet $tweet)
    {
        DB::beginTransaction();

        $comment = $tweet->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->get('content'),
        ]);

        $tweet->user->notify(new TweetCommented($comment));

        DB::commit();
    }
}
