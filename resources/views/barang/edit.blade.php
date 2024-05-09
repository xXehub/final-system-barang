@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Data Barang</h4>
                        <form action="#">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Kode Barang</label>
                                            <input class="form-control @error('kode_barang') is-invalid @enderror"
                                                type="text"  name="kode_barang" id="kode_barang"
                                                value="{{ $errors->any() ? old('kode_barang') : $barang->kode_barang }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Nama Barang</label>
                                            <input class="form-control @error('nama_barang') is-invalid @enderror"
                                                type="text" name="nama_barang" id="nama_barang"
                                                value="{{ $errors->any() ? old('nama_barang') : $barang->nama_barang }}"
                                                placeholder="Ubah Nama Barang">
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
                                                value="{{ $errors->any() ? old('harga_barang') : $barang->harga_barang }}"
                                                placeholder="Ubah Harga Barang">
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
                                            name="deskripsi_barang" value="" placeholder="Enter Deskripsi barang">{{ $errors->any() ? old('deskripsi_barang') : $barang->deskripsi_barang }}</textarea>
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

 
    <script>
        // Membuat fungsi untuk memeriksa panjang karakter kode_barang saat memasukkan data
        document.addEventListener('DOMContentLoaded', function() {
            var kode_barang_input = document.getElementById('kode_barang');
            kode_barang_input.addEventListener('input', function() {
                // Jika panjang karakter lebih dari 7, hapus nilai input
                if (this.value.length > 7) {
                    this.value = this.value.slice(0, 7);
                }
            });
        });
    </script>
@endsection
