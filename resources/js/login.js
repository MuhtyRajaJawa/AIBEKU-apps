import {
    findUserByEmail,
    setCurrentUser
} from "./storage";

document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("#loginForm");

    if (!form) return;

    form.addEventListener("submit", function (e) {

        e.preventDefault();

        const email = document.querySelector("#email").value.trim();

        const password = document.querySelector("#password").value;

        const user = findUserByEmail(email);

        if (!user) {

            alert("Email tidak ditemukan.");

            return;

        }

        if (user.password !== password) {

            alert("Password salah.");

            return;

        }

        setCurrentUser(user);

        alert("Login berhasil.");

        window.location.href = "/";

    });

});