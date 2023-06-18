const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn--open");



openModalBtn.addEventListener("click", ()=>
    {
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    }
);