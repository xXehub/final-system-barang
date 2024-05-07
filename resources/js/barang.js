$(document).ready(function() {
    $("#barangTable").DataTable({
        // serverSide: true,
        // processing: true,
        ajax: "/data/barang",
        columns: [
            { data: "kode_barang", name: "kode_barang" },
            { data: "nama_barang", name: "nama_barang" },
            { data: "harga_barang", name: "harga_barang" },
            { data: "deskripsi_barang", name: "deskripsi_barang" },
            { data: "satuan_id", name: "satuan_id" },
            { data: "actions", name: "actions", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });

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
