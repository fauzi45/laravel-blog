@extends('template.template')
@section('title','Admin | Tambah Artikel')
@section('sub-judul',' Tambah Artikel')
@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endpush
@if ($errors->any())
    <div class="my-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    
@endif
<div class="d-flex justify-content-end mb-2">
    <a href="{{ url('article') }}" class="btn btn-primary">Kembali</a>
</div>
<form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control @error('title')
            is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
        @error('title') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="" hidden>-- Pilih --</option>
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" style="height: 50px"></textarea>
    </div>

    <div class="form-group">
        <label>Tags</label>
        <select name="tags[]" class="form-control select2" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Gambar (Max 2MB)</label>
        <input type="file" name="img" id="img" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" id="status" class="form-control">
            <option value="" hidden>-- Pilih --</option>
            <option value="0">Private</option>
            <option value="1">Publish</option>
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Terbit</label>
        <input type="date" name="publish_date" id="publish_date" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </div>
</form>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush