<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {

        $article = Article::with('Category')
            ->where('status', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        $keyword = request()->keyword;
        if ($keyword) {
            $article = Article::with('Category')
                ->where('status', '1')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        } else {
            $article;
        }
        return view('front.article.index', compact('article','keyword'));
    }

    public function show($slug)
    {
        $article = Article::with('Category','tags')->where('slug', $slug)->firstorfail();
        $article->increment('views');
        $category = Category::orderBy('created_at', 'desc')->get();
        return view('front.article.show', compact('article', 'category'));
    }
}
