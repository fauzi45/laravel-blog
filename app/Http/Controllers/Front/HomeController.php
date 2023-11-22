<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest_article = Article::with('category')
            ->where('status', '1')
            ->orderBy('created_at', 'desc')
            ->first();

        $article = Article::with('category')
            ->where('status', '1')
            ->orderBy('created_at', 'desc')
            ->simplepaginate(4);

        $category = Category::orderBy('created_at', 'desc')->get();
        $total_article = Article::count();
        return view('front.home.index', compact('latest_article', 'article', 'category', 'total_article'));
    }

    public function about()
    {
        $category = Category::orderBy('created_at', 'desc')->get();

        return view('front.home.about', compact('category'));
    }
}
