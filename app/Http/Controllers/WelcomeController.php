<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $search = request()->query('search');
        if($search) {
            
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        
        } else {
            $posts = Post::simplePaginate(3);
        }



        return view('welcome')
    
            ->with('posts', $posts)
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }  
    
    
}
