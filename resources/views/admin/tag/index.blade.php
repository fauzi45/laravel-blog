@extends('template.template')
@section('title','Admin | Tag')
@section('sub-judul','Tag')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="mt-3">
        <a href="{{ route('tag.create') }}" class="btn btn-info btn-sm text-white mb-4"> Tambah</a>
        <table class="table table-stripped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <form action="{{ route('tag.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('tag.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
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