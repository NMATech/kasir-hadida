const modalAddUser = document.getElementById("modalAddUser");
const modalEditUser = document.getElementById("modalEditUser");

// Initialize DataTable for users
$("#tableUsers").DataTable({
  paging: true,
  pageLength: 10,
});

function showModalAddUser() {
  modalAddUser.classList.toggle("hidden");
  modalAddUser.classList.toggle("flex");

  // Reset form
  if (!modalAddUser.classList.contains("hidden")) {
    modalAddUser.querySelector("form").reset();
  }
}

function showModalEditUser(user = null) {
  modalEditUser.classList.toggle("hidden");
  modalEditUser.classList.toggle("flex");

  if (user) {
    // Populate form with user data
    document.getElementById("edit_username").value = user.username;
    document.getElementById("edit_email").value = user.email;
    document.getElementById("edit_full_name").value = user.full_name;
    document.getElementById("edit_role").value = user.role;
    document.getElementById("edit_password").value = "";

    // Set form action
    setActionToFormEditUser(user.id);
  }
}
