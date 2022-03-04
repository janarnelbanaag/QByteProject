let purchased = [];
let products = document.querySelectorAll(".product-name");
let product = Array.from(products);
let cart = document.querySelector(".lowercart");
let list = document.querySelector(".list");
var a = document.getElementsByClassName("product-name");
var b = document.getElementById("removethis");
console.log(a[0].innerText);

console.log(product);

function addToCart(val) {
  purchased.push(a[val].innerText);
  b.remove();
  //
  let row = document.createElement("div");
  row.innerHTML = purchased[purchased.length - 1];
  row.style.display = "flex";
  row.style.justifyContent = "space-between";
  row.classList.add("prods");
  let btn = document.createElement("input");
  btn.classList.add("rem");
  btn.value = "remove";
  btn.type = "submit";
  btn.onclick = function (event) {
    var tbremove = event.target.parentElement.textContent.toString();
    var index = purchased.indexOf(tbremove);
    purchased.splice(index, 1);
    event.target.parentElement.remove();
    console.log(purchased);
  };
  row.appendChild(btn);
  list.appendChild(row);
  console.log(purchased);
  //
}

function ordercatch() {
  if (purchased.length === 0) {
    var site = "products.php?error=no-items";
    window.location.href = site;
  } else {
    var site = "checkout.php?item=" + purchased;
    window.location.href = site;
  }
}

var x = 1;
let cartmob = document.getElementById("cartmob");
cartmob.onclick = function () {
  var cartt = document.getElementById("cart");
  var head = document.getElementById("head");
  cartt.style.display = "block";
  cartt.style.width = "100%";
  let back = document.createElement("a");
  back.style.textDecoration = "underline";
  back.style.color = "#fefae0";
  back.style.fontSize = "20px";
  back.innerText = "Back";

  back.onclick = function () {
    cartt.style.display = "none";
  };
  back.style.float = "right";
  back.style.marginRight = "20px";
  head.style.marginLeft = "40px";
  if (x === 1) {
    head.appendChild(back);
    x += 1;
    console.log(x);
  }
  cart.style.height = "100%";
  // let widthMatch = window.matchMedia("(min-width: 700px)");
  // widthMatch.addEventListener("change", function () {
  //   // Get HTML head element
  //   // cartt.style.display = "none";
  //   // cartt.style.display = "block";
  //   cartt.classList.remove("cart");
  //   cartt.classList.add("cartt");
  //   console.log("aaaaaaaa");
  // });
};
