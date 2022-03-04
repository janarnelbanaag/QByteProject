const editnamebtnEl = document.querySelector("#edit-name");
const savenamebtnEl = document.querySelector("#save-name");

const editcnumberbtnEl = document.querySelector("#edit-cnumber");
const savecnumberbtnEl = document.querySelector("#save-cnumber");

const editemailbtnEl = document.querySelector("#edit-email");
const saveemailbtnEl = document.querySelector("#save-email");

const editpasswordbtnEl = document.querySelector("#edit-password");
const savepasswordbtnEl = document.querySelector("#save-password");

const inputnamebtnEl = document.querySelector(".input-name");
const inputcnumberbtnEl = document.querySelector(".input-cnumber");
const inputemailbtnEl = document.querySelector(".input-email");
const inputpasswordbtnEl = document.querySelector(".input-password");
const inputpasswordrepeatbtnEl = document.querySelector(
  ".input-password-repeat"
);

// Name
editnamebtnEl.addEventListener("click", firstclickEditName);
function firstclickEditName(e) {
  inputnamebtnEl.removeAttribute("readonly");
  inputnamebtnEl.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  editnamebtnEl.textContent = "CANCEL";
  e.stopImmediatePropagation();
  this.removeEventListener("click", firstclickEditName);
  editnamebtnEl.onclick = secondClickEditName;
}
function secondClickEditName(e) {
  inputnamebtnEl.setAttribute("readonly", true);
  inputnamebtnEl.style.backgroundColor = "transparent";
  editnamebtnEl.textContent = "EDIT";
  e.stopImmediatePropagation();
  this.removeEventListener("click", secondClickEditName);
  editnamebtnEl.onclick = firstclickEditName;
}

savenamebtnEl.addEventListener("click", function () {
  inputnamebtnEl.setAttribute("readonly", true);
  inputnamebtnEl.style.backgroundColor = "transparent";
});

// Contact Number
editcnumberbtnEl.addEventListener("click", firstclickEditCNumber);
function firstclickEditCNumber(e) {
  inputcnumberbtnEl.removeAttribute("readonly");
  inputcnumberbtnEl.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  editcnumberbtnEl.textContent = "CANCEL";
  e.stopImmediatePropagation();
  this.removeEventListener("click", firstclickEditCNumber);
  editcnumberbtnEl.onclick = secondClickEditCNumber;
}
function secondClickEditCNumber(e) {
  inputcnumberbtnEl.setAttribute("readonly", true);
  inputcnumberbtnEl.style.backgroundColor = "transparent";
  editcnumberbtnEl.textContent = "EDIT";
  e.stopImmediatePropagation();
  this.removeEventListener("click", secondClickEditCNumber);
  editcnumberbtnEl.onclick = firstclickEditCNumber;
}

savecnumberbtnEl.addEventListener("click", function () {
  inputcnumberbtnEl.setAttribute("readonly", true);
  inputcnumberbtnEl.style.backgroundColor = "transparent";
});

// Email
editemailbtnEl.addEventListener("click", firstclickEditEmail);
function firstclickEditEmail(e) {
  inputemailbtnEl.removeAttribute("readonly");
  inputemailbtnEl.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  editemailbtnEl.textContent = "CANCEL";
  e.stopImmediatePropagation();
  this.removeEventListener("click", firstclickEditEmail);
  editemailbtnEl.onclick = secondClickEditEmail;
}
function secondClickEditEmail(e) {
  inputemailbtnEl.setAttribute("readonly", true);
  inputemailbtnEl.style.backgroundColor = "transparent";
  editemailbtnEl.textContent = "EDIT";
  e.stopImmediatePropagation();
  this.removeEventListener("click", secondClickEditEmail);
  editemailbtnEl.onclick = firstclickEditEmail;
}

saveemailbtnEl.addEventListener("click", function () {
  inputemailbtnEl.setAttribute("readonly", true);
  inputemailbtnEl.style.backgroundColor = "transparent";
});

// Password
editpasswordbtnEl.addEventListener("click", firstclickEditPassword);
function firstclickEditPassword(e) {
  inputpasswordbtnEl.removeAttribute("readonly");
  inputpasswordbtnEl.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  inputpasswordrepeatbtnEl.removeAttribute("readonly");
  inputpasswordrepeatbtnEl.style.display = "inherit";
  inputpasswordrepeatbtnEl.style.backgroundColor = "rgba(0, 0, 0, 0.25)";
  editpasswordbtnEl.textContent = "CANCEL";
  e.stopImmediatePropagation();
  this.removeEventListener("click", firstclickEditPassword);
  editpasswordbtnEl.onclick = secondClickEditPassword;
}
function secondClickEditPassword(e) {
  inputpasswordbtnEl.setAttribute("readonly", true);
  inputpasswordbtnEl.style.backgroundColor = "transparent";
  inputpasswordrepeatbtnEl.setAttribute("readonly", true);
  inputpasswordrepeatbtnEl.style.display = "none";
  inputpasswordrepeatbtnEl.style.backgroundColor = "transparent";
  editpasswordbtnEl.textContent = "EDIT";
  e.stopImmediatePropagation();
  this.removeEventListener("click", secondClickEditPassword);
  editpasswordbtnEl.onclick = firstclickEditPassword;
}
savepasswordbtnEl.addEventListener("click", function () {
  inputpasswordbtnEl.setAttribute("readonly", true);
  inputpasswordbtnEl.style.backgroundColor = "transparent";
  inputpasswordrepeatbtnEl.removeAttribute("readonly");
  inputpasswordrepeatbtnEl.style.display = "none";
  inputpasswordrepeatbtnEl.style.backgroundColor = "transparent";
});
