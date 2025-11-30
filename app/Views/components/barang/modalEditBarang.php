<div id="modalEditBarang" class="w-full h-svh absolute inset-0 z-20 hidden justify-center items-center bg-[#333] bg-opacity-50 ease-in-out">
    <div class="w-[30em] bg-white z-30 rounded-lg shadow-lg p-4">
        <div class="w-full flex justify-end">
            <button class="cursor-pointer hover:bg-[#efefef] rounded-full p-2" onclick="showModalEditBarang()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <h4 class="text-2xl font-bold text-center">Edit Barang</h4>

        <form id="formEditBarang" method="post">
            <div class="flex flex-col gap-3 mt-5">
                <div class="flex flex-col gap-2">
                    <p>Nama Barang</p>
                    <input type="text" id="edit_name_barang" name="edit_name_barang" class="w-full border border-gray-400 rounded-lg p-2" required>
                </div>
                <div class="flex flex-col gap-2">
                    <p>Kategori</p>
                    <select id="edit_category_id" name="edit_category_id" class="w-full border border-gray-400 rounded-lg p-2" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($category as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <p>Code QR</p>
                    <input type="text" id="edit_code_qr" name="edit_code_qr" class="w-full border border-gray-400 rounded-lg p-2" required>
                </div>
                <div class="flex flex-col gap-2">
                    <p>Modal</p>
                    <input type="number" id="edit_modal" name="edit_modal" class="w-full border border-gray-400 rounded-lg p-2" step="0.01" required>
                </div>
                <div class="flex flex-col gap-2">
                    <p>Harga Jual</p>
                    <input type="number" id="edit_harga_jual" name="edit_harga_jual" class="w-full border border-gray-400 rounded-lg p-2" step="0.01" required>
                </div>
                <div class="mt-3">
                    <button type="submit" class="w-full bg-emerald-500 p-2 rounded-lg text-white hover:scale-105">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const baseUrlEditBarang = '<?= base_url() ?>'
</script>