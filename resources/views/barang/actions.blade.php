<div class="d-flex">
    <a href="{{ route('barang.show', ['barang' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-inboxes"></i></a>
    <a href="{{ route('barang.edit', ['barang' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

    <div>
        <form id="delete-form-{{$barang->id}}" action="{{ route('barang.destroy', ['barang' => $barang->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-outline-dark btn-sm me-2" onclick="confirmDelete({{$barang->id}})"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>



{{-- SweetAlert Library --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Script untuk konfirmasi delete --}}
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus?',
            text: "Barang yang telah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirimkan formulir penghapusan
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

{{-- Notifikasi setelah penghapusan --}}
@if ($message = Session::get('hapus'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: '{{ $message }}'
        });
    </script>
@endif

