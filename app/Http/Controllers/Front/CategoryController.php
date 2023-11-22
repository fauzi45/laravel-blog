<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slugCategory){
        $article = Article::with('Category')
            ->whereHas('Category',function ($c) use($slugCategory){
                $c->where('slug', $slugCategory);
                })
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

        return view('front.category.index',compact('article','keyword','slugCategory'));
    }
}
