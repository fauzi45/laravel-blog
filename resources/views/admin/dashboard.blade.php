@extends('template.template')
@section('title','Admin | Dashboard')
@section('sub-judul','Dashboard')

@section('content')
<main class="col-md-9 col-lg-12">
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card text-white bg-primary mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Artikel</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_article }} Artikel</h5>
                        <p class="card-text">
                            <a href="{{ url('article') }}" class="text-white">Tampilkan</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-white bg-info mb-3" style="max-width: 100%;">
                    <div class="card-header">Total Kategori</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_category }} Kategori</h5>
                        <p class="card-text">
                            <a href="{{ url('categories') }}" class="text-white">Tampilkan</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h4>Artikel Terbaru</h4>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latest_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Category->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ url('article/'.$item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <h4>Artikel Populer</h4>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Views</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_article as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Category->name }}</td>
                                <td>{{ $item->views }}x</td>
                                <td class="text-center">
                                    <a href="{{ url('article/'.$item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection