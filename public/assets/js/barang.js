const modalCreateAddBarang = document.getElementById("modalCreateAddBarang");

$("#tableBarang").DataTable({
  paging: false,
});

function showModalCreateAddBarang() {
  modalCreateAddBarang.classList.toggle("hidden");
  modalCreateAddBarang.classList.toggle("flex");
}
