@extends('template.template')
@section('title','Admin | Tambah Tag')
@section('sub-judul','Tambah Tag')
@section('content')
<form action="{{ route('tag.store') }}" method="post">
    @csrf
    <div class="form-group">
    <label>Kategori</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" name="name" id="name" value="{{ old('name') }}">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Simpan</button>
    </div>
</form>
@endsection