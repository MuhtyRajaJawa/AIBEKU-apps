document.addEventListener("DOMContentLoaded", () => {

    heroAnimation();
    revealAnimation();
    counterAnimation();

});

/* ==========================================
   HERO ANIMATION
========================================== */

function heroAnimation(){

    const elements = [

        ".hero__badge",
        ".hero__title",
        ".hero__description",
        ".hero__button",
        ".hero__statistic",
        ".hero__right"

    ];

    elements.forEach((selector, index) => {

        const element = document.querySelector(selector);

        if(!element) return;

        setTimeout(() => {

            element.classList.add("show");

        }, index * 180);

    });

}

/* ==========================================
   SCROLL REVEAL
========================================== */

function revealAnimation(){

    const reveals = document.querySelectorAll(".reveal");

    if(reveals.length === 0) return;

    const observer = new IntersectionObserver((entries, observer) => {

        entries.forEach(entry => {

            if(entry.isIntersecting){

                entry.target.classList.add("show");

                observer.unobserve(entry.target);

            }

        });

    },{

        threshold:0.15,
        rootMargin:"0px 0px -80px 0px"

    });

    reveals.forEach(section => {

        observer.observe(section);

    });

}

function counterAnimation(){

    const counters = document.querySelectorAll(".counter");

    const observer = new IntersectionObserver((entries)=>{

        entries.forEach(entry=>{

            if(!entry.isIntersecting) return;

            const counter = entry.target;

            const target = parseFloat(counter.dataset.target);

            const suffix = counter.dataset.suffix || "";

            const duration = 1800;

            const start = performance.now();

            function update(now){

                const progress = Math.min((now - start) / duration, 1);

                const value = target * progress;

                if(target % 1 !== 0){

                    counter.textContent = value.toFixed(1) + suffix;

                }else{

                    counter.textContent =
                        Math.floor(value).toLocaleString("id-ID") + suffix;

                }

                if(progress < 1){

                    requestAnimationFrame(update);

                }

            }

            requestAnimationFrame(update);

            observer.unobserve(counter);

        });

    });

    counters.forEach(counter=>observer.observe(counter));

}