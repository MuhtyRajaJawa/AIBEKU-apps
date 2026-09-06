document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("#registerForm");

    if (!form) return;

    form.addEventListener("submit", function (e) {

        const password = document.querySelector("#password").value;
        const confirmPassword = document.querySelector("#confirmPassword").value;

        // Cek konfirmasi password
        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Konfirmasi password tidak sesuai.");
            return;
        }

        // Kalau sesuai, biarkan form dikirim ke Laravel
        // Laravel yang akan menyimpan data ke database
    });

});