<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

/**
 * The controller to control all models relating to comments
 */
class CommentController extends Controller
{
    /**
     * List the comments ordered by ascending allong with its child comments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comment::query()
            ->orderBy("created_at", "ASC")
            ->get();

        // Implemented Eager loading to pull all comments in a single query
        // better performance
        foreach($data as $d) {
            // A magic way to override the magic __get function for Laravel Model
            $d->children = array_merge($data->where("parent_id", "=" ,$d->id)->all(), []);
        }
        $comments = $data->whereNull("parent_id");

        return $comments;
    }


    /**
     * Store a newly created comments in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required|max:100',
            'comment' => 'required'
        ], [
            "name.required" => 'Hey! We really need to know your name.',
            'comment.required' => 'Please say something that could make sense.'
        ]);

        $comment = new Comment();
        $comment->name = $r->get('name');
        $comment->comment = $r->get('comment');
        $comment->parent_id = $r->get('parent_id');
        $comment->save();

        // Set children to empty array to be used in front-end
        $comment->children = [];

        return response()->json([
            'message' => "New comment[ID: {$comment->id}] added",
            'data' => $comment
        ]);
    }
}
