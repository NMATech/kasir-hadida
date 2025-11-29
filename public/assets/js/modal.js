const modalDelete = document.getElementById("modalDelete");
const textHeadlineModal = document.getElementById("textHeadlineModal");
const textModal = document.getElementById("textModal");

function showModalDelete(datas = null) {
  modalDelete.classList.toggle("hidden");
  modalDelete.classList.toggle("flex");

  if (datas) {
    setTextIntoModalDelete(datas);
  }
}

function setTextIntoModalDelete(datas) {
  textHeadlineModal.textContent = `Hapus ${datas.headline}`;
  textModal.textContent = `Apakah anda yakin ingin menghapus data ${datas.nama}?`;

  setActionToFormDelete(datas.url);
}
