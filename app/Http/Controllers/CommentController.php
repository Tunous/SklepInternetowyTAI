<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function addComment(Request $request, Product $product)
    {
        $data = $this->validate($request, [
            'body' => 'required|string'
        ]);

        $comment = new Comment($data);
        $comment->user()->associate($request->user());
        $comment->product()->associate($product);
        $comment->save();

        return back();
    }

    public function deleteComment(Request $request, Comment $comment)
    {
        if (Auth::user()->id != $comment->user_id) {
            abort(403);
        }
        $comment->delete();
        return back();
    }
}
