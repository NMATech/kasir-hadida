<div id="modalEditUser" class="w-full h-svh absolute inset-0 z-20 hidden justify-center items-center bg-[#333] bg-opacity-50 ease-in-out">
    <div class="w-[30em] bg-white z-30 rounded-lg shadow-lg p-4">
        <div class="w-full flex justify-end">
            <button class="cursor-pointer hover:bg-[#efefef] rounded-full p-2" onclick="showModalEditUser()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <h4 class="text-2xl font-bold text-center">Edit User</h4>

        <form id="formEditUser" action="" method="post">
            <div class="flex flex-col gap-3 mt-5">
                <div class="flex flex-col gap-2">
                    <label for="edit_username">Username <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_username" name="username" class="w-full border border-gray-400 rounded-lg p-2" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="edit_email">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="edit_email" name="email" class="w-full border border-gray-400 rounded-lg p-2" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="edit_full_name">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_full_name" name="full_name" class="w-full border border-gray-400 rounded-lg p-2" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="edit_password">Password Baru</label>
                    <input type="password" id="edit_password" name="password" class="w-full border border-gray-400 rounded-lg p-2" minlength="6">
                    <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="edit_role">Role <span class="text-red-500">*</span></label>
                    <select id="edit_role" name="role" class="w-full border border-gray-400 rounded-lg p-2" required>
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="flex gap-3 mt-4">
                    <button type="button" class="flex-1 bg-gray-500 p-2 rounded-lg text-white hover:bg-gray-600" onclick="showModalEditUser()">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-emerald-500 p-2 rounded-lg text-white hover:bg-emerald-600">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const baseUrlEditUser = '<?= base_url() ?>';
    const formEditUser = document.getElementById('formEditUser');

    function setActionToFormEditUser(id) {
        formEditUser.setAttribute('action', `${baseUrlEditUser}/users/edit/${id}`);
    }
</script>