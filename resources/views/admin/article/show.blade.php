@extends('template.template')
@section('title','Admin | Artikel')
@section('sub-judul','Artikel')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <main class="col-md-9 col-lg-12">
        <div class="mt-3">
            <table class="table table-stripped table-bordered bg-white">
                <tr>
                    <th width="250px">Judul</th>
                    <td>{{ $article->title }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $article->Category->name }}</td>
                </tr>
                <tr>
                    <th>Tags</th>
                    <td>@foreach ($article->tags as $tag)
                    <h6><span class="badge badge-primary">{{ $tag->name }}</span></h6>
                    @endforeach</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $article->desc }}</td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td>
                        <a href="{{ asset('storage/article/img/'.$article->img) }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('storage/article/img/'.$article->img) }}" alt="" width="50%">    
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Views</th>
                    <td>{{ $article->views }}x</td>
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($article->status == 1)
                    <td><span class="badge bg-success text-white">Published</span></td>
                    @else
                    <td><span class="badge bg-danger text-white">Private</span></td>
                    @endif
                </tr>
                <tr>
                    <th>Tanggal Terbit</th>
                    <td>{{ $article->publish_date }}</td>
                </tr>
            </table>
        </div>
    </main>
@endsection