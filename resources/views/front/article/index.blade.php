@extends('front.layout.template')

@section('title','Artikel Blog')

<!-- Page content-->
@section('content')
<div class="container">
    <div class="mb-3">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="Cari Artikel..."/>
                <button class="btn btn-primary" id="button-search" type="submit">Submit</button>
            </div>
        </form>
    </div>
    @if ($keyword)
        <p>Menampilkan artikel dengan kata: <b>{{ $keyword }}</b></p>
    @endif
    <div class="row">
        @forelse ($article as $item)
        <div class="col-4">
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('articles/'.$item->slug) }}"><img class="card-img-top post-img"
                        src="{{ asset('storage/article/img/'.$item->img) }}" style="" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ $item->created_at->format('d-m-Y') }}</div>
                    <h1 class="card-title">{{ $item->title }}</h2>
                        <p class="card-text">{{ $item->desc }}</p>
                </div>
            </div>
        </div>
        @empty
            <p>Tidak ada data yang dicari</p>
        @endforelse
    </div>
    <div class="pagination justify-content-center my-4">
        {{ $article->links() }}
    </div>
</div>
@endsection
<!-- Footer-->