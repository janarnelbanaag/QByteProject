const leftarrowEl1 = document.querySelector(".left1");
const leftarrowEl2 = document.querySelector(".left2");
const leftarrowEl3 = document.querySelector(".left3");
const rightarrowEl1 = document.querySelector(".right1");
const rightarrowEl2 = document.querySelector(".right2");
const rightarrowEl3 = document.querySelector(".right3");

const featuredEl_1 = document.querySelector(
  ".content .best-sellers ul li:nth-child(1)"
);
const featuredEl_2 = document.querySelector(
  ".content .best-sellers ul li:nth-child(2)"
);
const featuredEl_3 = document.querySelector(
  ".content .best-sellers ul li:nth-child(3)"
);

//#region Arrow Events - Product 1
rightarrowEl1.addEventListener("touchstart", function () {
  //
  if (
    window.getComputedStyle(featuredEl_2).display === "none" &&
    window.getComputedStyle(featuredEl_3).display === "none"
  ) {
    featuredEl_2.style.display = "inherit";
    featuredEl_1.style.display = "none";
    rightarrowEl1.style.display = "none";
  }
});
//#endregion Arrow Events - Product 1

//#region Arrow Events - Product 2
leftarrowEl2.addEventListener("touchstart", function () {
  //
  if (
    window.getComputedStyle(featuredEl_1).display === "none" &&
    window.getComputedStyle(featuredEl_3).display === "none"
  ) {
    featuredEl_1.style.display = "inherit";
    featuredEl_2.style.display = "none";
    leftarrowEl1.style.display = "none";
    rightarrowEl1.style.display = "inherit";
    leftarrowEl3.style.display = "inherit";
  }
});
rightarrowEl2.addEventListener("touchstart", function () {
  //
  if (
    window.getComputedStyle(featuredEl_1).display === "none" &&
    window.getComputedStyle(featuredEl_3).display === "none"
  ) {
    featuredEl_3.style.display = "inherit";
    featuredEl_2.style.display = "none";
    rightarrowEl3.style.display = "none";
  }
});
//#endregion Arrow Events - Product 2

//#region Arrow Events - Product 3
leftarrowEl3.addEventListener("touchstart", function () {
  //
  if (
    window.getComputedStyle(featuredEl_1).display === "none" &&
    window.getComputedStyle(featuredEl_2).display === "none"
  ) {
    featuredEl_2.style.display = "inherit";
    featuredEl_3.style.display = "none";
    leftarrowEl3.style.display = "none";
  }
});
//#endregion Arrow Events - Product 3
