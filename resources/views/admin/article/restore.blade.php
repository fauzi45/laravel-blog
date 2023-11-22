@extends('template.template')
@section('title','Admin | List Artikel Dihapus')
@section('sub-judul','List Artikel Dihapus')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
<main class="col-md-9 col-lg-12">
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="mt-3">
        <table class="table table-stripped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Tanggal Terbit</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>

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
    const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'title': 'success',
                'text': swal,
                'icon': 'success'
            })
        }
</script>

<script>
    function restoreArticle(e){
        let id = e.getAttribute('data-id');
            Swal.fire({
                title: "Pulihkan",
                text: "Apakah kamu yakin?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Pulihkan!",
                cancelButtonText: "Batal"
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'GET',
                        url: '/article/restore/' + id,
                        dataType: "json",
                        success: function(response){
                            Swal.fire({
                            title: "Terpulihkan!",
                            text: response.message,
                            icon: "success",
                            }).then((result) => {
                                window.location.href = '/article/restore';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError){
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });                
                }
            })
        }
</script>

{{-- Function Delete Artikel --}}
<script>
    function deleteArticle(e){
            let id = e.getAttribute('data-id');
            Swal.fire({
                title: "Hapus Permanen",
                text: "Apakah kamu yakin?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!",
                cancelButtonText: "Batal"
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/article/restore/delete/' + id,
                        dataType: "json",
                        success: function(response){
                            Swal.fire({
                            title: "Terhapus!",
                            text: response.message,
                            icon: "success",
                            }).then((result) => {
                                window.location.href = '/article/restore';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError){
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });                
                }
            })
        }
</script>

{{-- List Datatable --}}
<script>
    $(document).ready(function(){
            $('#dataTable').DataTable({
                processing:true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'views',
                        name: 'views'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    }
                    ,
                    {
                        data: 'button',
                        name: 'button'
                    }
                ]
            });
        });
</script>
@endpush