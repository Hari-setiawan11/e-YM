document.getElementById("arsipForm").addEventListener("submit", function (e) {
    let isValid = true;
    let fields = [
        {
            id: "programs_id",
            message: "Program harus diisi",
        },
        {
            id: "jenisArsip_id",
            message: "Jenis arsip harus diisi",
        },
        {
            id: "file",
            message: "File harus diisi",
        },
    ];

    for (let field of fields) {
        let element = document.getElementById(field.id);
        if (!element.value) {
            isValid = false;
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: field.message,
                confirmButtonText: "Oke",
                confirmButtonColor: "#6777ef", // Warna primary Laravel/Bootstrap
            });
            element.focus();
            e.preventDefault();
            break; // Break the loop after the first invalid field is found
        }
    }

    if (!isValid) {
        e.preventDefault();
    }
});
