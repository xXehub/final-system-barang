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

