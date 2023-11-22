@extends('template.template')
@section('title','Admin | Ubah Tag')
@section('sub-judul','Ubah Tag')
@section('content')
<form action="{{ route('tag.update',$tag->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
    <label>Kategori</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" name="name" id="name" value="{{ old('name',$tag->name) }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
    <div class="form-group">
        <button class="btn btn-primary btn-block"> Simpan Kategori</button>
    </div>
</form>
@endsection