import {
    addUser,
    findUserByEmail
} from "./storage";

document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("#registerForm");

    if (!form) return;

    form.addEventListener("submit", function (e) {

        e.preventDefault();

        const name = document.querySelector("#name").value.trim();

        const email = document.querySelector("#email").value.trim();

        const password = document.querySelector("#password").value;

        const confirmPassword = document.querySelector("#confirmPassword").value;

        // Validasi

        if (!name || !email || !password || !confirmPassword) {

            alert("Semua data wajib diisi.");

            return;

        }

        if (password !== confirmPassword) {

            alert("Konfirmasi password tidak sesuai.");

            return;

        }

        if (findUserByEmail(email)) {

            alert("Email sudah terdaftar.");

            return;

        }

        const user = {

            id: Date.now(),

            name,

            email,

            password

        };

        addUser(user);

        alert("Registrasi berhasil.");

        window.location.href = "/login";

    });

});