const SideBarMenu = document.getElementById("sidebar-menu");
const NavbarToggle = document.getElementById("navbar-toggle");
const SideBarCloseButton = document.getElementById("sidebar-menu-close-button");

let sidebarStatus = false;

NavbarToggle.addEventListener("click", () => {
  sidebarStatus = !sidebarStatus;

  if (sidebarStatus) {
    SideBarMenu.classList.remove("sidebar-menu-close");
    SideBarMenu.classList.add("sidebar-menu-open");
    return;
  }

  SideBarMenu.classList.remove("sidebar-menu-open");
  SideBarMenu.classList.add("sidebar-menu-close");
});

SideBarCloseButton.addEventListener("click", () => {
    sidebarStatus = false;
  
    SideBarMenu.classList.remove("sidebar-menu-open");
    SideBarMenu.classList.add("sidebar-menu-close");
  });
