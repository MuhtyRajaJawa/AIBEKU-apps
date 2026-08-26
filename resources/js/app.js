import './bootstrap';
import './animation';
import "./landing";
import { createIcons, icons } from "lucide";

window.renderIcons = () => {
    createIcons({
        icons,
    });
};

document.addEventListener("DOMContentLoaded", () => {
    window.renderIcons();
});

document.addEventListener("DOMContentLoaded", () => {

    const track = document.querySelector(".inspiration-track");

    if (!track) return;

    let position = 0;
    const speed = 0.6;


    let isDragging = false;

    let startX = 0;
    let currentX = 0;

function animate(){

    if(!isDragging){

        position -= speed;

        const firstGrid = track.children[0];

        if(Math.abs(position) >= firstGrid.offsetWidth + 40){

            position += firstGrid.offsetWidth + 40;

            track.appendChild(firstGrid);

        }

        track.style.transform = `translateX(${position}px)`;

    }

    requestAnimationFrame(animate);

}

    animate();


    /* Drag Desktop */

    track.addEventListener("mousedown",(e)=>{

        isDragging=true;

        startX=e.clientX-currentX;

    });

    window.addEventListener("mousemove",(e)=>{

        if(!isDragging) return;

        currentX=e.clientX-startX;

        position=currentX;

        track.style.transform=`translateX(${position}px)`;

    });

    window.addEventListener("mouseup",()=>{

        isDragging=false;

    });

    /* Mobile */

    track.addEventListener("touchstart",(e)=>{

        isDragging=true;

        startX=e.touches[0].clientX-currentX;

    });

    track.addEventListener("touchmove",(e)=>{

        if(!isDragging) return;

        currentX=e.touches[0].clientX-startX;

        position=currentX;

        track.style.transform=`translateX(${position}px)`;

    });

    track.addEventListener("touchend",()=>{

        isDragging=false;

    });

});

document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.querySelector(".navbar");
    const toggle = document.querySelector(".navbar__toggle");
    const menu = document.querySelector(".navbar__menu");

    if (!navbar || !toggle || !menu) return;

    toggle.addEventListener("click", (e) => {
        e.stopPropagation();
        navbar.classList.toggle("active");
        document.body.classList.toggle("menu-open");
    });

    document.querySelectorAll(".navbar__link").forEach(link => {
        link.addEventListener("click", () => {
            navbar.classList.remove("active");
            document.body.classList.remove("menu-open");
        });
    });

    document.addEventListener("click", (e) => {
        if (!navbar.contains(e.target)) {
            navbar.classList.remove("active");
            document.body.classList.remove("menu-open");
        }
    });

});