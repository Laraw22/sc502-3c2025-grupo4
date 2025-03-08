document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.getElementById("menuToggle");
  const sideMenu = document.getElementById("sideMenu");

  menuToggle.addEventListener("mouseover", function () {
    // Al pasar el cursor, muestra el menú
    sideMenu.style.right = "0";
  });

  sideMenu.addEventListener("mouseleave", function () {
    // Al salir del menú, se oculta
    sideMenu.style.right = "-250px";
  });
});
