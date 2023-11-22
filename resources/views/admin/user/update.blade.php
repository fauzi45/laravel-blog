@extends('template.template')
@section('title','Admin | Ubah User')
@section('sub-judul','Ubah User')
@section('content')
<form action="{{ route('users.update',$user->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control @error('name')
        is-invalid
    @enderror" name="name" id="name" value="{{ $user->name }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
    </div>

    <div class="form-group">
        <label>Tipe User</label>
        <select class="form-control" name="role" id="">
            <option value="" hidden>Pilih Tipe User</option>
            <option value="1"
            @if ($user->role == 1)
                selected                
            @endif
            >Administrator</option>
            <option value="2"
            @if ($user->role == 2)
                selected                
            @endif
            >Penulis</option>
        </select>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Simpan</button>
    </div>
</form>
@endsection