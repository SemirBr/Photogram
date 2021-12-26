<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use \Illuminate\Http\Request;
use App\Events\NewCommentEvent;

class CommentController extends Controller
{
    
    public function destroy(Request $request, Comment $comment)
    {
        if($request->user()->cannot('delete', $comment)){
            abort(403);
        }
        $comment->delete();
    }
    
    public function store(StoreCommentRequest $request)
    {
        $post = Post::findOrFail($request->post);
        $validated = $request->validated();   
        $comment = new Comment();
        $comment->text = strip_tags($validated['text']);
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post->id);
        try {
            $comment->saveOrFail();
            
             NewCommentEvent::dispatch($comment->post, auth()->user());
             
             return redirect()->route('post.show', ['post' => $post->id]);
        } catch (\Throwable $ex) {
            if ($comment->id) {
                $comment->delete();
            }
            
            return redirect()->back()->withErrors([$ex->getMessage()]);
        }
    }

    
    
}
