const modalCreateAddBarang = document.getElementById("modalCreateAddBarang");
const modalEditBarang = document.getElementById("modalEditBarang");
const formEditBarang = document.getElementById("formEditBarang");
const inputEditNameBarang = document.getElementById("edit_name_barang");
const inputEditCategoryId = document.getElementById("edit_category_id");
const inputEditCodeQr = document.getElementById("edit_code_qr");
const inputEditModal = document.getElementById("edit_modal");
const inputEditHargaJual = document.getElementById("edit_harga_jual");

$("#tableBarang").DataTable({
  paging: false,
  columnDefs: [{ targets: "_all", defaultContent: "" }],
  scrollY: "400px",
  scrollCollapse: true,
  fixedHeader: true,
});

function showModalCreateAddBarang() {
  modalCreateAddBarang.classList.toggle("hidden");
  modalCreateAddBarang.classList.toggle("flex");
}

function showModalEditBarang(
  barangId = null,
  namaBarang = null,
  categoryId = null,
  codeQr = null,
  modal = null,
  hargaJual = null
) {
  modalEditBarang.classList.toggle("hidden");
  modalEditBarang.classList.toggle("flex");

  if (barangId) {
    setValuesToInputBarang(namaBarang, categoryId, codeQr, modal, hargaJual);
    setActionToFormEditBarang(barangId);
  }
}

function setValuesToInputBarang(
  namaBarang,
  categoryId,
  codeQr,
  modal,
  hargaJual
) {
  inputEditNameBarang.value = namaBarang;
  inputEditCategoryId.value = categoryId;
  inputEditCodeQr.value = codeQr;
  inputEditModal.value = modal;
  inputEditHargaJual.value = hargaJual;
}

function setActionToFormEditBarang(id) {
  formEditBarang.setAttribute(
    "action",
    `${baseUrlEditBarang}/edit/barang/${id}`
  );
}
