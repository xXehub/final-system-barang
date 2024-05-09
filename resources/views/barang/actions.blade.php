{{-- multi group --}}
<form id="delete-form-{{ $barang->id }}" action="{{ route('barang.destroy', ['barang' => $barang->id]) }}"
    method="POST">
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <a type="button" href="{{ route('barang.show', ['barang' => $barang->id]) }}" class="btn btn-secondary"><i
                    class="ti-search"></i></a>
            <a type="button" href="{{ route('barang.edit', ['barang' => $barang->id]) }}" class="btn btn-secondary"><i
                    class="ti-pencil-alt"></i></a>
            @csrf
            @method('delete')
            <button type="button" class="btn btn-secondary" onclick="confirmDelete({{ $barang->id }})"><i
                    class="ti-trash"></i></button>
        </div>
    </div>
</form>
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
