@extends('template.template')
@section('title','Admin | Tambah User')
@section('sub-judul','Tambah User')
@section('content')
<form action="{{ route('users.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Nama User</label>
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
        <label>Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Tipe User</label>
        <select class="form-control" name="role" id="">
            <option value="" hidden>Pilih Tipe User</option>
            <option value="1">Administrator</option>
            <option value="2">Penulis</option>
        </select>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Simpan</button>
    </div>
</form>
@endsection