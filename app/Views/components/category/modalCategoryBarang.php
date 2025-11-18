<div id="modalCategoryBarang" class="w-full h-svh absolute inset-0 z-20 hidden justify-center items-center bg-[#333] bg-opacity-50 ease-in-out">
    <div class="w-[40em] bg-white z-30 rounded-lg shadow-lg pt-4 px-4 pb-10">
        <div class="w-full flex justify-end">
            <button class="cursor-pointer hover:bg-[#efefef] rounded-full p-2" onclick="showModalCategoryBarang()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <h4 class="text-2xl font-bold text-center">Kategori Barang</h4>
        <div class="w-max z-10 flex items-center gap-2 relative mt-10">
            <button class="flex items-center gap-2 text-white bg-emerald-500 hover:bg-emerald-500/90 cursor-pointer rounded-lg p-2" onclick="showModalCategoryAddKategori()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <p>
                    Tambah Kategori
                </p>
            </button>
        </div>
        <div class="mt-[-50px]">
            <table id="tableCategory" class="min-w-full border border-gray-200 bg-white text-sm">
                <thead class="bg-sky-500 text-white">
                    <tr>
                        <th class="px-4 py-3 font-medium" style="text-align: center;">No</th>
                        <th class="px-4 py-3 font-medium" style="text-align: center;">Nama Kategori</th>
                        <th class="px-4 py-3 font-medium" style="text-align: center;">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-3" style="text-align: center;">1</td>
                        <td class="px-4 py-3">Makanan & Minuman</td>
                        <td class="flex justify-center items-center gap-3 px-4 py-3">
                            <button class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600">
                                Edit
                            </button>
                            <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>