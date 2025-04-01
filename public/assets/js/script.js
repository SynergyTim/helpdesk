let currentLocation = window.location.pathname;

// Fungsi untuk menangani tombol hapus dengan SweetAlert
function setupDeleteButtons(selector, formClass) {
    document.querySelectorAll(selector).forEach((element) => {
        element.addEventListener("click", function () {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = element.closest(formClass);
                    if (form) form.submit();
                }
            });
        });
    });
}

// Eksekusi berdasarkan path
switch (currentLocation) {
    case "/unit":
        setupDeleteButtons(".btnHapusUnit", ".form-unit-delete");
        break;
    case "/users":
        setupDeleteButtons(".btnHapusUser", ".form-user-delete");
        break;
    case "/category":
        setupDeleteButtons(".btnHapusCategory", ".form-category-delete");
        break;
}
