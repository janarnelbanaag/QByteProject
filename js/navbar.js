const hambmenuEl = document.querySelector(".hamb-menu");
const navlinksEl = document.querySelector(".navbar nav ul #links");

hambmenuEl.addEventListener("click", function () {
  navlinksEl.classList.toggle("active");
});
