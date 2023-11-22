@extends('template.template')
@section('title','Admin | Ubah Artikel')
@section('sub-judul',' Ubah Artikel')
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
<form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input type="hidden" name="oldImg" value="{{ $article->img }}">
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title',$article->title) }}">
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="" hidden>-- Pilih --</option>
            @foreach ($category as $item)
                <option value="{{ $item->id }}"
                    @if ($article->category_id == $item->id)
                        selected
                    @endif
                    >{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="desc" id="desc" class="form-control"> {{ $article->desc }}</textarea>
    </div>

    <div class="form-group">
        <label>Tags</label>
        <select name="tags[]" class="form-control select2" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                @foreach ($article->tags as $value)
                    @if ($tag->id == $value->id)
                        selected                        
                    @endif
                @endforeach
                >{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Gambar (Max 2MB)</label>
        <input type="file" name="img" id="img" class="form-control">
        <div class="mt-2">
            <small>Gambar Lama</small><br>
            <a href="{{ asset('storage/article/img/'.$article->img) }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('storage/article/img/'.$article->img) }}" alt="" width="100px">    
            </a>
        </div>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" id="status" class="form-control">
            <option value="" hidden>-- Pilih --</option>
            <option value="0" {{ $article->status == 0 ? 'selected' : null }}>Private</option>
            <option value="1" {{ $article->status == 1 ? 'selected' : null }}>Publish</option>
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Terbit</label>
        <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ $article->publish_date }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Simpan</button>
    </div>
</form>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush