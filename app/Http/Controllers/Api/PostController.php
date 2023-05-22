<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;
use App\Models\Header;
use App\Models\Image;
use App\Models\Subheadline;
use App\Models\Article;
use App\Models\User;

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

    public function archived(string $id) {
        $header = Post::join('headers', 'headers.id', 'posts.mode_id')
                ->where('posts.mode_id', $id)
                ->where('type', 'header')
                ->select()
                ->get();

        $user = Post::join('users', 'users.id', 'posts.user_id')
                ->where('posts.mode_id', $id)
                ->where('location', 0)
                ->select()
                ->get();

        $subheadline = Post::join('subheadlines', 'subheadlines.id', 'posts.mode_id')
                ->where('posts.mode_id', $id)
                ->where('type', 'subheadline')
                ->select()
                ->get();

        $image = Post::join('images', 'images.mode_id', 'posts.mode_id')
                ->where('posts.mode_id', $id)
                ->where('type', 'image')
                ->select()
                ->get();
        
        $content = Post::join('contents', 'contents.mode_id', 'posts.mode_id')
                ->where('posts.mode_id', $id)
                ->where('posts.location', 'contents.location')
                ->groupBy('contents.location')
                // ->where('type', 'paragraph')
                ->select()
                ->get();
        $content->each(function ($item) {
            $item->type = 'paragraph';
        });

        $post = array_merge($header->toArray(), $user->toArray(), $subheadline->toArray(), $image->toArray(), $content->toArray());
        usort($post, function ($a, $b) {
            return $a['location'] - $b['location'];
        });
        return response()->json($post, 200, ['OK']);
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

    public function article(Request $request) {
        $articles = Article::create($request->all());
        return response()->json($articles, 200, ['OK']);
    }

    public function showArticle() {
        return response()->json(Article::all(), 200, ['OK']);
    }

    public function showPost($hot) {
        $posts = Article::whereIn('hot', $hot)
                ->where('status_id', 3)
                ->orderBy('hot', 'asc')
                ->select()
                ->get();
        $posts = json_decode($posts);
        $newPosts = [];
        foreach ($posts as $post) {
            array_push($newPosts, json_decode($post->JSON));
        }
        $new = [];
        foreach($newPosts as $index => $postss) {
            $obj = [];
            $obj['id'] = $posts[$index]->id;
            $obj['hot'] = $posts[$index]->hot;
            $obj['author_id'] = $posts[$index]->author_id;
            $obj['categorie_id'] = $posts[$index]->categorie_id;
            $obj['author'] = $this->show_user($posts[$index]->author_id);
            foreach ($postss as $key => $post) {
                if ($post->type === 'header') {
                    if ($post->data->level === 1) {
                        $obj['title'] = $post->data->text;
                    } else if ($post->data->level === 2) {
                        $obj['subheadline'] = $post->data->text;
                    }
                } else if ($post->type === 'image') {
                    $obj['image'] = $post->data->url;
                }
            }
            $obj['created_at'] = $posts[$index]->created_at;

            array_push($new, $obj);
        }

        return $new;
    }

    public function show_user($id) {
        $data = User::join('image_users', 'user_id', '=', 'users.id')
            ->where('user_id', $id)
            ->select()
            ->get();
            return $data;
    }

    public function showPostHot() {
        return response()->json($this->showPost([1, 2]), 200, ['OK']);
    }

    public function showPostHot_0() {
        return response()->json($this->showPost([0, 0]), 200, ['OK']);
    }

    public function showArticleById($id) {
        $posts = Article::where('id', $id)
                // ->where('status_id', 3)
                ->select()
                ->get();
        $posts = json_decode($posts);
        $newPosts = [];
        foreach ($posts as $index => $post) {
            $newPosts['status_article'] = $posts[$index]->status_id;
            $newPosts['created_at'] = $posts[$index]->created_at;
            $newPosts['data_article'] = json_decode($post->JSON);
            $newPosts['data_user'] = $this->show_user($posts[$index]->author_id);
        }

        return $newPosts;
    }
}
