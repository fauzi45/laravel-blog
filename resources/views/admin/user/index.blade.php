@extends('template.template')
@section('title','Admin | Users')
@section('sub-judul','List User')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="mt-3">
        @if (auth()->user()->role == 1)
        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm text-white mb-4">Tambah</a>
        @endif
        <table class="table table-stripped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if ($item->role == 1)
                        <span class="badge badge-success">Admin</span>
                        @elseif (($item->role == 2))
                        <span class="badge badge-info">Penulis</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            @if ((auth()->user()->role == 1))
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                @if (($item->role == 1) != auth()->user()->role)
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @endif
                            @elseif ((auth()->user()->role == 2) )
                                @if ($item->id == auth()->user()->id)
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                @endif
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    new DataTable('#dataTable');
</script>
<script>
    const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'success',
                'text': swal,
                'icon': 'success'
            })
        }
</script>
@endpush