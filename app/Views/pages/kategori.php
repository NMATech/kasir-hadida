<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col">
    <h3 class="text-3xl font-bold"><?= $title; ?></h3>
    <p class="text-sm">15 November 2025</p>
</div>
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
            <?php foreach ($category as $idx => $item): ?>
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3" style="text-align: center;"><?= $idx + 1; ?></td>
                    <td class="text-center px-4 py-3"><?= $item['category_name']; ?></td>
                    <td class="flex justify-center items-center gap-3 px-4 py-3">
                        <button class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600" onclick="showModalEditKategori('<?= $item['id']; ?>', '<?= $item['category_name']; ?>')">
                            Edit
                        </button>

                        <?php
                        // data untuk di pass ke modal delete
                        $datas = [
                            'headline' => 'Kategori',
                            'nama' => $item['category_name'],
                            'url' => 'delete/kategori/' . $item['id']
                        ];
                        ?>

                        <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600" onclick='showModalDelete(<?= json_encode($datas) ?>)'>
                            Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/category/modalAddKategoriBarang'); ?>
<?= $this->include('components/category/modalEditCategory'); ?>
<?= $this->endSection() ?>