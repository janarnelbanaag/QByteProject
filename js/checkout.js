document.getElementById("checkout-btn").onclick = function () {
  document.getElementById("left-content").style.width = "100%";
  document.getElementById("lowerleft-content").style.width = "70%";
  document.getElementById("right-content").style.width = "0%";
  document.getElementById("right-content").style.display = "none";

  totalPrice = 0;
  let allpay = [];
  let pay = Array.from(document.querySelectorAll(".proPrice"));
  // console.log(pay);
  for (let i = 0; i < pay.length; i++) {
    // console.log(product[i].innerText);
    // console.log(product.length);
    allpay.push(pay[i].innerText);
  }
  // console.log(allpay);
  var arrnum = allpay.map(Number);
  // console.log(arrnum);
  for (let i = 0; i < arrnum.length; i++) {
    totalPrice += arrnum[i];
  }
  // console.log(totalPrice);

  let price = document.getElementsByClassName("proPrice");
  for (var i = 0; i < price.length; i++) {
    price[i].textContent = "Pending...";
  }

  let time = document.getElementById("time").value;
  let date = document.getElementById("deliverydate").value;
  let content = document.querySelector(".right");

  let deltime = document.createElement("div");
  deltime.innerHTML =
    "Preparing your order!<br>Please Prepare " +
    totalPrice +
    "php and<br> pick up<br>" +
    date +
    " in " +
    time;
  deltime.classList.add("deltime");
  content.appendChild(deltime);

  let left = document.getElementById("left");
  left.style.width = "fit-content";

  let widthMatch = window.matchMedia("(max-width: 700px)");
  if (widthMatch.matches) {
    document.getElementById("left-content").style.display = "inline-block";
  }
  widthMatch.addEventListener("change", function (mm) {
    if (mm.matches) {
      document.getElementById("left-content").style.display = "inline-block";
    }
  });

  let arrow = document.getElementById("arrow");
  arrow.remove();
};
