<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Author::all();
    }

    public function show($id)
    {
        $post = Author::find($id);
        if (!$post) {
            return response()->json([
                'message' => 'Post not found'
            ],404);
        }

        return $post;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'biography' => 'required'
        ]);

        return Author::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $post = Author::find($id);

        if ($post) {
            $post->update($request->all());
            return response()->json([
                'message' => 'Post has been updated',
            ]);
        }

        return response()->json([
            'message' => 'Post not found'
        ], 404);
    }

    public function delete($id)
    {
        $post = Author::find($id);

        if ($post) {
            $post->delete();

            return response()->json([
                'message' => 'Post has been deleted'
            ]);
        }

        return response()->json([
            'message' => 'Post not found'
        ], 404);
    }

    //
}
