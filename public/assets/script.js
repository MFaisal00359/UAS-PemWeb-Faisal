document.addEventListener("DOMContentLoaded", () => {
    const formTambah = document.getElementById("formTambah");

    if (formTambah) {
        formTambah.addEventListener("submit", (e) => {
            e.preventDefault();

            // Ambil nilai input
            const namaModel = document.getElementById("nama_model").value.trim();
            const kategori = document.getElementById("kategori").value;
            const status = document.querySelector('input[name="status"]:checked');

            // Validasi input
            if (namaModel === "") {
                alert("Nama model wajib diisi!");
                return;
            }
            if (!status) {
                alert("Status wajib dipilih!");
                return;
            }

            // Submit form jika validasi berhasil
            formTambah.submit();
        });
    }
});
