const containerContent = document.getElementById("container-content");
const sidebar = document.getElementById("sidebar");
const iconExpand = document.getElementById("icon-expand");
const cardMenuBarang = document.getElementById("cardMenuBarang");

function toggleExpandSidebar() {
  sidebar.classList.toggle("hidden");
  sidebar.classList.toggle("flex");
  containerContent.classList.toggle("w-[85%]");
  containerContent.classList.toggle("w-full");

  if (containerContent.classList.contains("w-[85%]")) {
    iconExpand.setAttribute(
      "d",
      "m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"
    );
  } else {
    iconExpand.setAttribute(
      "d",
      "m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"
    );
  }
}

function showMenuBarang() {
  cardMenuBarang.classList.toggle("hidden");
  cardMenuBarang.classList.toggle("flex");
}
