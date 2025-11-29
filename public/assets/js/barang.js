const modalCreateAddBarang = document.getElementById("modalCreateAddBarang");

$("#tableBarang").DataTable({
  paging: false,
  columnDefs: [{ targets: "_all", defaultContent: "" }],
});

function showModalCreateAddBarang() {
  modalCreateAddBarang.classList.toggle("hidden");
  modalCreateAddBarang.classList.toggle("flex");
}
