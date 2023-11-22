@extends('front.layout.template')

@section('title',$article->title)

<!-- Page content-->
@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('articles/'.$article->slug) }}"><img class="card-img-top single-img"
                        src="{{ asset('storage/article/img/'.$article->img) }}" style="" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <span class="ml-2">{{ $article->created_at->format('d-m-Y') }}</span>
                        <span class="ml-2">
                            <a href="{{ url('category/'.$article->Category->slug) }}"
                                class="unstyle-category text-black">{{ $article->Category->name }}</a>
                        </span>
                        <span class="ml-2">{{ $article->views }}</span>x
                    </div>
                    <h1 class="card-title">{{ $article->title }}</h2>
                        <p class="card-text">{{ $article->desc }}</p>
                        <td>Tags :
                            @foreach ($article->tags as $tag)
                            <h6><span class="badge badge-primary">{{ $tag->name }}</span></h6>
                            @endforeach
                        </td>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout.side-widget')
    </div>
</div>
@endsection
<!-- Footer-->