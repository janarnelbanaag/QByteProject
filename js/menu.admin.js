const addItemBtnEl = document.querySelector(".add-menu-btn");

const addInventoryFormEl = document.querySelector("#addMenuForm");

// Category
const catselectEl = document.querySelector("#catSelect");

// For Item Image Preview
const addItemImgEl = document.querySelector("#add-item-img");
const previewImgEl = document.querySelector("#preview");

addItemBtnEl.addEventListener("click", firstclickAddMenu);
function firstclickAddMenu(e) {
  addInventoryFormEl.style.display = "flex"; //
  e.stopImmediatePropagation();
  this.removeEventListener("click", firstclickAddMenu);
  addItemBtnEl.onclick = secondClickAddMenu;
}
function secondClickAddMenu(e) {
  addInventoryFormEl.style.display = "none"; //
  e.stopImmediatePropagation();
  this.removeEventListener("click", secondClickAddMenu);
  addItemBtnEl.onclick = firstclickAddMenu;
}

addItemImgEl.onchange = (evt) => {
  const [file] = addItemImgEl.files;
  if (file) {
    previewImgEl.src = URL.createObjectURL(file);
  }
};

function selectCat() {
  var catSelectVal = document.getElementById("catSelect").value;
  $.ajax({
    url: "../showProductPrice.php",
    method: "POST",
    data: {
      id: catSelectVal,
    },
    success: function (data) {
      $("#try").html(data); //
    },
    error: function (error) {
      alert("error" + eval(error));
    },
  });
}
