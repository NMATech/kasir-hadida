const modalCreateAddBarang = document.getElementById("modalCreateAddBarang");
const modalCategoryBarang = document.getElementById("modalCategoryBarang");
const modalCreateAddKategori = document.getElementById(
  "modalCreateAddKategori"
);

$("#tableBarang").DataTable({
  paging: false,
});

$("#tableCategory").DataTable({
  paging: false,
});

function showModalCreateAddBarang() {
  modalCreateAddBarang.classList.toggle("hidden");
  modalCreateAddBarang.classList.toggle("flex");
}

function showModalCategoryBarang() {
  modalCategoryBarang.classList.toggle("hidden");
  modalCategoryBarang.classList.toggle("flex");
}

function showModalCategoryAddKategori() {
  modalCreateAddKategori.classList.toggle("hidden");
  modalCreateAddKategori.classList.toggle("flex");
}
