<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            if (request()->ajax()) {
                $article = Article::with('Category', 'users')->latest()->get();
                return DataTables::of($article)
                    ->addIndexColumn()
                    ->addColumn('category_id', function ($article) {
                        return $article->Category->name;
                    })
                    ->addColumn('user_id', function ($article) {
                        return $article->users->name;
                    })
                    ->addColumn('status', function ($article) {
                        if ($article->status == 0) {
                            return '<span class="badge bg-danger text-white">Private</span>';
                        } else {
                            return '<span class="badge bg-success text-white">Published</span>';
                        }
                    })
                    ->addColumn('button', function ($article) {
                        return '<div class="text-center">
                            <a href="article/' . $article->id . '" class="btn btn-secondary">Detail</a>
                            <a href="article/' . $article->id . '/edit" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                        </div>';
                    })
                    ->rawColumns(['category_id', 'status', 'button'])
                    ->make();
            }
        return view('admin.article.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        return view('admin.article.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/article/img', $filename);

        $data['img'] = $filename;
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = FacadesAuth::id();
        $post = Article::create($data);

        $post->tags()->attach($request->tags);
        return redirect()->route('article.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('category')->findorfail($id);
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findorfail($id);
        $category = Category::all();
        $tags = Tags::all();

        return view('admin.article.update', compact('article', 'category', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/article/img', $filename);

            Storage::delete('public/article/img' . $request->oldImg);
            $data['img'] = $filename;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);
        $post = Article::findorfail($id);

        $post->tags()->sync($request->tags);
        $post->update($data);
        return redirect()->route('article.index')->with('success', 'Artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::findorfail($id);
        // $data->tags()->detach();
        $data->delete();
        return response()->json([
            'message' => 'Artikel berhasil dihapus'
        ]);
    }

    public function tampil_hapus()
    {
        if (request()->ajax()) {
            $article = Article::onlyTrashed()->with('Category')->latest()->get();

            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger text-white">Private</span>';
                    } else {
                        return '<span class="badge bg-success text-white">Published</span>';
                    }
                })
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                            <a href="#" onclick="restoreArticle(this)" data-id="' . $article->id . '" class="btn btn-primary">Restore</a>
                            <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                        </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('admin.article.restore');
    }

    public function restore($id)
    {
        $article = Article::withTrashed()->where('id', $id)->first();
        $article->restore();
        return response()->json([
            'message' => 'Artikel berhasil dipulihkan'
        ]);
    }

    public function forceDelete($id)
    {
        $article = Article::withTrashed()->where('id', $id)->first();
        $article->tags()->detach();
        Storage::delete('public/article/img' . $article->img);
        $article->forceDelete();
        return response()->json([
            'message' => 'Artikel berhasil dihapus permanen'
        ]);
    }
}
