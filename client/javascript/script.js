const menuIcon = document.querySelector("[data-menu]");
const menuCloseIcon = document.querySelector("[data-close-menu]");
const mobileMenuItems = document.querySelector("[data-mobile-navbar-items]");

menuIcon.addEventListener("click", openNavbar);
menuCloseIcon.addEventListener("click", closeNavbar);

function openNavbar() {
  mobileMenuItems.classList.remove("hidden");
}

function closeNavbar() {
  mobileMenuItems.classList.add("hidden");
}