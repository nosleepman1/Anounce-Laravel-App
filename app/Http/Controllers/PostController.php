<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StorePostRequest $request)
    {
        try {
            $data = $request->validated();
            $post = Post::create($data);
            return response()->json([
                'message' => 'insertion reussie',
                'datas' => $data
            ], 201);
        } catch (Exception $e) {
            return response()->json($e);
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post->find($post->id), 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, UpdatePostRequest $request)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $data = $request->validated();
            $post->update($data);

            return response()->json([
                'message' => 'Modification reussie',
                'datas' => $data
            ], 200);

        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();

            return response()->json([
                'message' => 'Supression reussie'
            ], 200);

        } catch (Exception $e) {
            return response()->json($e);
        }

    }
}
