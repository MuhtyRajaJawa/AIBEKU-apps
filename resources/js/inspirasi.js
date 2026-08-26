document.addEventListener("DOMContentLoaded", () => {

    const filterButtons =
        document.querySelectorAll(".filter-button");

    const cards =
        document.querySelectorAll(".inspiration-card");

    const emptyState =
        document.querySelector("#inspirationEmpty");


    if (!filterButtons.length || !cards.length) {
        return;
    }


    filterButtons.forEach((button) => {

        button.addEventListener("click", () => {

            const filter =
                button.dataset.filter;


            // ==========================
            // ACTIVE BUTTON
            // ==========================

            filterButtons.forEach((btn) => {

                btn.classList.remove("active");

            });

            button.classList.add("active");


            // ==========================
            // FILTER CARD
            // ==========================

            let visibleCards = 0;


            cards.forEach((card) => {

                const category =
                    card.dataset.category;


                const shouldShow =
                    filter === "semua" ||
                    category === filter;


                if (shouldShow) {

                    card.classList.remove("hidden");

                    visibleCards++;

                } else {

                    card.classList.add("hidden");

                }

            });


            // ==========================
            // EMPTY STATE
            // ==========================

            if (emptyState) {

                if (visibleCards === 0) {

                    emptyState.classList.add("show");

                } else {

                    emptyState.classList.remove("show");

                }

            }

        });

    });

});