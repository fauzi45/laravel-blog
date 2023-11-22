<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_article = Article::count();
        $total_category = Category::count();
        $latest_article = Article::with('category')
        ->where('status','1')
        ->orderBy('created_at','desc')
        ->take(5)
        ->get();
        $popular_article = Article::with('category')
        ->where('status','1')
        ->orderBy('views','desc')
        ->take(5)
        ->get();
        return view('admin.dashboard',compact('total_article','total_category','latest_article','popular_article'));
    }
}
