<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;
use App\Models\Header;
use App\Models\Image;
use App\Models\Subheadline;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function post(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 200, ['OK']);
    }

     public function header(Request $request)
    {
        $header = Header::create($request->all());
        return response()->json($header, 200, ['OK']);
    }

     public function subheadline(Request $request)
    {
        $subheadline = Subheadline::create($request->all());
        return response()->json($subheadline, 200, ['OK']);
    }

     public function image(Request $request)
    {
        $image = Image::create($request->all());
        return response()->json($image, 200, ['OK']);
    }

     public function content(Request $request)
    {
        $content = Content::create($request->all());
        return response()->json($content, 200, ['OK']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
