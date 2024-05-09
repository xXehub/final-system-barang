$(document).ready(function() {
    $("#barangTable").DataTable({
        ajax: "/data/barang",
        columns: [
            { data: "kode_barang", name: "kode_barang" },
            { data: "nama_barang", name: "nama_barang" },
            { 
                data: "harga_barang", 
                name: "harga_barang",
                render: function(data, type, row) {
                    // Format harga_barang ke dalam format rupiah
                    return 'Rp. ' + formatRupiah(data);
                }
            },
            { data: "deskripsi_barang", name: "deskripsi_barang" },
            { 
                data: "kode_satuan", 
                name: "kode_satuan",
                render: function(data, type, row) {
                    return '<button type="button" class="btn btn-primary">' + row.nama_satuan + ' <span class="badge text-bg-light">' + data + '</span><span class="sr-only">unread messages</span></button>';
                }
            },
            { data: "actions", name: "actions", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });

    // Fungsi untuk format angka ke format Rupiah
    function formatRupiah(angka, prefix){
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split       = number_string.split(','),
            sisa        = split[0].length % 3,
            rupiah      = split[0].substr(0, sisa),
            ribuan      = split[0].substr(sisa).match(/\d{3}/gi),
            separator;

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }

    // Memastikan inisialisasi DataTables setelah halaman sepenuhnya dimuat
    $(document).ajaxComplete(function() {
        $("#barangTable").DataTable().draw();
    });

    $(".datatable").on("click", ".btn-delete", function(e) {
        e.preventDefault();

        var form = $(this).closest("form");
        var name = $(this).data("name");

        Swal.fire({
            title: "Are you sure want to delete\n" + name + "?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "bg-primary",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
