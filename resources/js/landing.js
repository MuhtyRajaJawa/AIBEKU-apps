import { getCurrentUser, logout } from "./storage";

document.addEventListener("DOMContentLoaded", () => {

// ==========================
// FAQ
// ==========================

const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach((item) => {

    const button = item.querySelector(".faq-question");

    if (!button) return;

    button.addEventListener("click", (event) => {

        event.preventDefault();
        event.stopPropagation();

        const isOpen = item.classList.contains("is-open");

        // Tutup semua
        faqItems.forEach((faq) => {

            faq.classList.remove("is-open");

            const faqButton =
                faq.querySelector(".faq-question");

            if (faqButton) {

                faqButton.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }

        });

        // Buka yang dipilih
        if (!isOpen) {

            item.classList.add("is-open");

            button.setAttribute(
                "aria-expanded",
                "true"
            );

        }

    });

});

    // ==========================
    // Navbar Login
    // ==========================
    const navbarAuth = document.querySelector("#navbarAuth");
    const user = getCurrentUser();

    if (navbarAuth && user) {

        navbarAuth.innerHTML = `
            <div class="navbar-profile">

                <button
                    class="navbar-profile__button"
                    id="profileButton">

                    👋 Halo, ${user.name}

                    <span class="navbar-profile__arrow">▼</span>

                </button>

                <div
                    class="navbar-dropdown"
                    id="profileDropdown">

                    <div class="navbar-dropdown__header">

                        <h4>${user.name}</h4>

                        <p>${user.email}</p>

                    </div>

                    <button
                        class="navbar-dropdown__logout"
                        id="logoutBtn">

                        Keluar

                    </button>

                </div>

            </div>
        `;

    const profileButton = document.querySelector("#profileButton");
    const dropdown = document.querySelector("#profileDropdown");
    const logoutBtn = document.querySelector("#logoutBtn");

    if (profileButton && dropdown && logoutBtn) {

        // Buka / Tutup Dropdown
        profileButton.addEventListener("click", (e) => {

            e.stopPropagation();
            dropdown.classList.toggle("active");

        });

        // Klik di luar dropdown
        document.addEventListener("click", (e) => {

            if (!e.target.closest(".navbar-profile")) {

                dropdown.classList.remove("active");

            }

        });

        // Logout
        logoutBtn.addEventListener("click", () => {

            logout();
            window.location.reload();

        });

    }

}
// ==========================
// Tombol Mulai Pindai
// ==========================
    const scanButton = document.querySelector("#scanButton");

    if (scanButton) {

        scanButton.addEventListener("click", (e) => {

            e.preventDefault();

            if (getCurrentUser()) {

                window.location.href = "/scan";

            } else {

                window.location.href = "/login";

            }

        });

    }

});