const loginformEl = document.querySelector("#LoginForm");
const regformEl = document.querySelector("#RegForm");
const indicatorEl = document.querySelector("#indicator");

const loginHeadingEl = document.querySelector(
  ".login-signup .login-signup-btns .login"
);
const signupHeadingEl = document.querySelector(
  ".login-signup .login-signup-btns .signup"
);

loginHeadingEl.addEventListener("click", function () {
  regformEl.style.transform = "translateX(100%)";
  loginformEl.style.transform = "translateX(100%)";
  indicatorEl.style.transform = "translateX(0px)";
});
signupHeadingEl.addEventListener("click", function () {
  regformEl.style.transform = "translateX(0px)";
  loginformEl.style.transform = "translateX(0px)";
  indicatorEl.style.transform = "translateX(100%)";
});
