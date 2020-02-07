<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentForRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function newComment(CommentForRequest $request) {
        $comment = new Comment([
           'ticket_id' => $request->get('t_id'),
           'content' => $request->get('content')
        ]);

        $comment->save();

        return redirect()->back()->with('status','Your Comment has been created');
    }
}
