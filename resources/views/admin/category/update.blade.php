@extends('template.template')
@section('title','Admin | Ubah Kategori')
@section('sub-judul','Ubah Kategori')
@section('content')
<form action="{{ route('categories.update',$category->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
    <label>Kategori</label>
    <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" name="name" id="name" value="{{ old('name',$category->name) }}">
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