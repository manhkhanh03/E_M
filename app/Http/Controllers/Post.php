<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Post extends Controller
{
    public function index() {
        return view('editerJS');
    }

    public function archived() {
        return view('archived');
    }

    public function post() {
        return view('post');
    }
    
    public function articles($id) {
        return view('articles') ->with('id_article', $id);
    }
}
