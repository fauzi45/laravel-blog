@extends('front.layout.template')

@section('title','Kategori '.$slugCategory)
<!-- Page content-->
@section('content')
<div class="container">
    <div class="mb-3">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="Cari Artikel..." />
                <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <p>Menampilkan artikel dengan kategori: <b>{{ $slugCategory }}</b></p>
    <div class="row">
        @forelse ($article as $item)
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('articles/'.$item->slug) }}"><img class="card-img-top post-img"
                        src="{{ asset('storage/article/img/'.$item->img) }}" style="" alt="..." /></a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        {{ $item->created_at->format('d-m-Y') }}
                        <a href="{{ url('category/'.$item->Category->slug) }}" class="unstyle-category text-black">{{
                            $item->Category->name }}</a>
                    </div>
                    <h1 class="card-title">{{ Str::limit(strip_tags($item->title),20,'...') }}</h2>
                        <p class="card-text">{{ Str::limit(strip_tags($item->desc),100,'...') }}</p>
                        <a class="btn btn-primary" href="{{ url('articles/'.$item->slug) }}">Read more →</a>

                </div>
            </div>
        </div>
        @empty
        <center>
            <p>Tidak ada artikel yang dicari</p>
        </center>
        @endforelse
    </div>
    <div class="pagination justify-content-center my-4">
        {{ $article->links() }}
    </div>
</div>
@endsection
<!-- Footer-->