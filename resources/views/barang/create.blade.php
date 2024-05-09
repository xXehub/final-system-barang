@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Tambah Barang</h4>
                            <form action="#">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Kode Barang</label>
                                                <input class="form-control @error('kode_barang') is-invalid @enderror"
                                                    type="text" name="kode_barang" id="kode_barang"
                                                    value="BRG-{{ old('kode_barang') }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input class="form-control @error('nama_barang') is-invalid @enderror"
                                                    type="text" name="nama_barang" id="nama_barang"
                                                    value="{{ old('nama_barang') }}" placeholder="Masukan Nama barang">
                                                @error('nama_barang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Satuan</label>
                                                <select name="satuan" id="satuan" class="form-select">
                                                    @foreach ($satuans as $satuan_sakkarepmu)
                                                        <option value="{{ $satuan_sakkarepmu->id }}"
                                                            {{ old('satuan') == $satuan_sakkarepmu->id ? 'selected' : '' }}>
                                                            {{ $satuan_sakkarepmu->kode_satuan . ' - ' . $satuan_sakkarepmu->nama_satuan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('satuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Harga</label>
                                                <input class="form-control @error('harga_barang') is-invalid @enderror"
                                                    type="text" name="harga_barang" id="harga_barang"
                                                    value="{{ old('harga_barang') }}" placeholder="Masukan Harga barang">
                                                @error('harga_barang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                {{-- <input type="text" class="form-control" placeholder="col-md-3"> --}}
                                                <textarea class="form-control @error('deskripsi_barang') is-invalid @enderror" id="deskripsi_barang" rows="3"
                                                    name="deskripsi_barang" placeholder="Masukan Deskripsi barang">{{ old('deskripsi_barang') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-info" onclick="simpanForm()">Simpan</button>

                                        <button type="button" class="btn btn-dark" onclick="resetForm()">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
// gawe random string kode_barang
function randomKode_sakkarepmu(length) {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var result = '';
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

// Call the function to generate random string and update the kode_barang input
document.addEventListener('DOMContentLoaded', function() {
    var kode_barang_input = document.getElementById('kode_barang');
    kode_barang_input.value = 'BRG-' + randomKode_sakkarepmu(3); // gawe selalu generate kode barang anyar
});


        </script>

    {{-- library sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- gawe nyeluk js pek --}}
    {{-- @vite('resources/js/barang.js') --}}

    {{-- gawe simpan barang --}}
    {{-- Notifikasi setelah penghapusan --}}
    <script>
        // gawe reset form
        function simpanForm() {
            console.log("Simpan Form Successs ");

            // sweet alert notif reset
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 13000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: 'Berhasil Menambahkan Barang'
            });
        };
    </script>

    {{-- end simpan barang --}}

    {{-- gawe resetform --}}
    <script>
        // gawe reset form
        function resetForm() {
            console.log("Form Reset Successs ");
            document.getElementById("nama_barang").value = '';
            document.getElementById("satuan").selectedIndex = 0;
            document.getElementById("harga_barang").value = '';
            document.getElementById("deskripsi_barang").value = '';

            // sweet alert notif reset
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
                title: 'Berhasil di Reset'
            });
        };
    </script>
    {{-- gawe notif gagal --}}
    @if ($message = Session::get('gagal'))
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
    {{-- gawe notif sukses --}}
    @if ($message = Session::get('success'))
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
@endsection
