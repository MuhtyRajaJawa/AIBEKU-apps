

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

    if (navbarAuth) {

        fetch("/user")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Belum login");
                }

                return response.json();
            })
            .then(user => {

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

                const profileButton =
                    document.querySelector("#profileButton");

                const dropdown =
                    document.querySelector("#profileDropdown");

                const logoutBtn =
                    document.querySelector("#logoutBtn");

                if (profileButton && dropdown && logoutBtn) {

                    profileButton.addEventListener("click", (e) => {

                        e.stopPropagation();

                        dropdown.classList.toggle("active");

                    });

                    document.addEventListener("click", (e) => {

                        if (!e.target.closest(".navbar-profile")) {

                            dropdown.classList.remove("active");

                        }

                    });

                    logoutBtn.addEventListener("click", async () => {

                        const csrfToken = document.querySelector(
                            'meta[name="csrf-token"]'
                        )?.content;

                        const response = await fetch("/logout", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                                "Accept": "application/json"
                            }
                        });

                        if (response.ok) {
                            window.location.href = "/";
                        } else {
                            alert("Logout gagal.");
                        }

                    });

                }

            })
            .catch(() => {
                // Belum login, biarkan tombol Masuk
            });

    }
// ==========================
// Tombol Mulai Pindai
// ==========================
const scanButton = document.querySelector("#scanButton");

if (scanButton) {

    scanButton.addEventListener("click", (e) => {

        e.preventDefault();

        fetch("/user")
            .then(response => {

                if (response.ok) {

                    window.location.href = "/scan";

                } else {

                    window.location.href = "/login";

                }

            })
            .catch(() => {

                window.location.href = "/login";

            });

    });

}
});