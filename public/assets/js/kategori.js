const modalCreateAddKategori = document.getElementById(
  "modalCreateAddKategori"
);
const modalEditKategori = document.getElementById("modalEditCategory");
const inputEditNameCategory = document.getElementById("edit_name_category");

$("#tableCategory").DataTable({
  paging: false,
});

function showModalCategoryAddKategori() {
  modalCreateAddKategori.classList.toggle("hidden");
  modalCreateAddKategori.classList.toggle("flex");
}

function showModalEditKategori(categoryId = null, prevValues = null) {
  modalEditKategori.classList.toggle("hidden");
  modalEditKategori.classList.toggle("flex");

  if (categoryId && prevValues) {
    console.log(categoryId);
    console.log(prevValues);
    setValuesToInput(prevValues);

    setActionToFormEditCategory(categoryId);
  }
}

function setValuesToInput(prevValues) {
  inputEditNameCategory.value = prevValues;
}
