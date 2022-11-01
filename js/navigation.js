const topNavigation = document.querySelector(".top-navbar");
const overlay = topNavigation.querySelector(".overlay");
const toggler = topNavigation.querySelector(".navbar-toggler");

const openSideNav = () => topNavigation.classList.add("active");
const closeSideNav = () => topNavigation.classList.remove("active");

toggler.addEventListener("click", openSideNav);
overlay.addEventListener("click", closeSideNav);