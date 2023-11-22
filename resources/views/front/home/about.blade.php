@extends('front.layout.template')

@section('title','About')
<!-- Page content-->
@section('content')
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="{{ asset('front/image/laravel.png') }}"><img class="card-img-top featured-img" src="{{ asset('front/image/laravel.png') }}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ date('d/m/Y') }}</div>
                    <h2 class="card-title">About Laravel Blog</h2>
                    <p class="card-text">Laravel adalah framework PHP open-source yang menyediakan berbagai fitur untuk membuat website berbasis PHP modern.

                        Sebelum membuat website, developer perlu memutuskan teknologi dan alat apa saja yang akan digunakan. Jika hanya membuat website sederhana, mereka bisa mengandalkan teknologi pembuat website tanpa kode. Namun, untuk membuat website yang lebih kompleks, developer memerlukan framework yang bisa dikembangkan dalam skala besar, salah satunya Laravel.
                        
                        Laravel memiliki serangkaian fitur canggih yang bisa dimanfaatkan untuk meningkatkan kecepatan pengembangan web, sehingga popularitasnya semakin meningkat dalam beberapa tahun terakhir dan menjadi framework pilihan developer.
                        
                        Laravel terkenal scalable dan memiliki basis kode yang terstruktur. Sistem pengemasan modular yang ada di Laravel menjadikan developer bisa memperluas fungsionalitas website dengan lebih cepat.</p>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout.side-widget')
    </div>
</div>
@endsection
<!-- Footer-->