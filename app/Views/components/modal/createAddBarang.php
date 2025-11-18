<div id="modalCreateAddBarang" class="w-full h-svh absolute inset-0 z-20 hidden justify-end items-center bg-[#333] bg-opacity-50 ease-in-out">
    <div class="w-[20em] h-svh bg-white z-30 rounded-lg shadow-lg p-4">
        <div class="w-full flex justify-end">
            <button class="cursor-pointer hover:bg-[#efefef] rounded-full p-2" onclick="showModalCreateAddBarang()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <h4 class="text-2xl font-bold text-center mt-10">Tambah Barang</h4>

        <form action="">
            <div class="flex flex-col gap-3 mt-5">
                <div class="flex flex-col gap-2">
                    <p>Nama Barang</p>
                    <input type="text" class="w-full border border-gray-400 rounded-lg p-2">
                </div>
                <div class="flex flex-col gap-2">
                    <p>Kategori Barang</p>
                    <select type="text" class="w-full border border-gray-400 rounded-lg p-2">
                        <option value="" selected disabled>Select</option>
                        <option value="">Makanan</option>
                        <option value="">Minuman</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <p>Harga Modal</p>
                    <input type="number" class="w-full border border-gray-400 rounded-lg p-2">
                </div>
                <div class="flex flex-col gap-2">
                    <p>Harga Jual</p>
                    <input type="number" class="w-full border border-gray-400 rounded-lg p-2">
                </div>
                <div class="mt-3">
                    <button type="submit" class="w-full bg-emerald-500 p-2 rounded-lg text-white hover:scale-105">
                        Tambah
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>