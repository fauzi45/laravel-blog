@extends('front.layout.template')

@section('title','Laravel Blog')
<!-- Page content-->
@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        
        @if($total_article == 0)
    <p>Tidak ada posting yang tersedia saat ini.</p>
@else
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('articles/'.$latest_article->slug) }}"><img class="card-img-top featured-img"
                        src="{{ asset('storage/article/img/'.$latest_article->img) }}" style="" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ $latest_article->created_at->format('d-m-Y') }}</div>
                    <h2 class="card-title">{{ $latest_article->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_article->desc),200,'...') }}</p>
                    <a class="btn btn-primary" href="{{ url('articles/'.$latest_article->slug) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($article as $item)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('articles/'.$item->slug) }}"><img class="card-img-top post-img"
                                src="{{ asset('storage/article/img/'.$item->img) }}" alt="..." /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                {{ $item->created_at->format('d-m-Y') }}
                                <a href="{{ url('category/'.$item->Category->slug) }}" class="unstyle-category text-black">{{ $item->Category->name }}</a>
                            </div>
                            <h2 class="card-title h4">{{ $item->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc),100,'...') }}</p>
                            <a class="btn btn-primary" href="{{ url('articles/'.$item->slug) }}">Read more →</a>
                        </div>
                    </div>
                    <!-- Blog post-->
                </div>
                @endforeach
            </div>
            <!-- <Pagination-->
            <div class="pagination justify-content-center my-4">
                {{ $article->links() }}
            </div>
        </div>
        <!-- Side widgets-->
        @endif
        @include('front.layout.side-widget')

    </div>
</div>
@endsection
<!-- Footer-->