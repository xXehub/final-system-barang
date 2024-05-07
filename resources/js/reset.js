$(document).ready(function() {
    $("#form-reset").on("reset", function(e) {
        e.preventDefault();
        console.log("Form Reset Successs ");
        document.getElementById("nama_barang").value = '';
        document.getElementById("satuan").selectedIndex = 0;
        document.getElementById("harga_barang").value = '';
        document.getElementById("deskripsi_barang").value = '';

        // SweetAlert notifikasi reset
        Swal.fire({
            icon: "success",
            title: 'Berhasil di Reset'
        });
    });
});
