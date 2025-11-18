<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col">
    <h3 class="text-3xl font-bold"><?= $title; ?></h3>
    <p class="text-sm">15 November 2025</p>
</div>
<div class="mt-5">
    <div class="w-max z-10 flex items-center gap-2 relative">
        <button class="flex items-center gap-2 text-white bg-emerald-500 hover:bg-emerald-500/90 cursor-pointer rounded-lg p-2" onclick="showModalCreateAddBarang()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <p>
                Tambah Barang
            </p>
        </button>
    </div>
    <div class="rounded-lg shadow mt-[-50px]">
        <table id="tableBarang" class="min-w-full border border-gray-200 bg-white text-sm">
            <thead class="bg-sky-500 text-white">
                <tr>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">No</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Nama Barang</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Kategori</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Modal</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Harga Jual</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Keuntungan</th>
                    <th class="px-4 py-3 font-medium" style="text-align: center;">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3" style="text-align: center;">1</td>
                    <td class="px-4 py-3">Rinso</td>
                    <td class="px-4 py-3">Cuci & Baju</td>
                    <td class="px-4 py-3" style="text-align: center;">5000</td>
                    <td class="px-4 py-3" style="text-align: center;">5500</td>
                    <td class="px-4 py-3" style="text-align: center;">500</td>
                    <td class="flex justify-center items-center px-4 py-3">
                        <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3" style="text-align: center;">2</td>
                    <td class="px-4 py-3">Indomie</td>
                    <td class="px-4 py-3">Makanan</td>
                    <td class="px-4 py-3" style="text-align: center;">3000</td>
                    <td class="px-4 py-3" style="text-align: center;">3500</td>
                    <td class="px-4 py-3" style="text-align: center;">500</td>
                    <td class="flex justify-center items-center px-4 py-3">
                        <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('components/modal/createAddBarang'); ?>
<?= $this->include('components/category/modalCategoryBarang'); ?>
<?= $this->include('components/category/modalAddKategoriBarang'); ?>

<?= $this->endSection() ?>