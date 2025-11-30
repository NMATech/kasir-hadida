<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

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
        <table id="tableBarang" class="min-w-full border border-gray-200 bg-white text-sm" style="text-align: center;">
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
                <?php if ($barang): ?>
                    <?php foreach ($barang as $key => $item): ?>
                        <?php
                        $categoryName = '';

                        foreach ($category as $x) {
                            if ($x['id'] == $item['category_id']) {
                                $categoryName = $x['category_name'];
                                break;
                            }
                        }
                        ?>
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3" style="text-align: center;"><?= $key + 1 ?></td>
                            <td class="px-4 py-3"><?= $item['nama_barang'] ?></td>
                            <td class="px-4 py-3"><?= $categoryName ?></td>
                            <td class="px-4 py-3" style="text-align: center;"><?= rtrim(rtrim($item['modal'], '0'), '.') ?></td>
                            <td class="px-4 py-3" style="text-align: center;"><?= rtrim(rtrim($item['harga_jual'], '0'), '.') ?></td>
                            <td class="px-4 py-3" style="text-align: center;"><?= rtrim(rtrim($item['keuntungan'], '0'), '.') ?></td>
                            <td class="flex justify-center items-center gap-3 px-4 py-3">
                                <button class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600" onclick="showModalEditBarang('<?= $item['id'] ?>', '<?= $item['nama_barang'] ?>', '<?= $item['category_id'] ?>', '<?= $item['code_qr'] ?>', '<?= $item['modal'] ?>', '<?= $item['harga_jual'] ?>')">
                                    Edit
                                </button>

                                <?php
                                // data untuk di pass ke modal delete
                                $datas = [
                                    'headline' => 'Barang',
                                    'nama' => $item['nama_barang'],
                                    'url' => 'delete/barang/' . $item['id']
                                ];
                                ?>

                                <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600" onclick='showModalDelete(<?= json_encode($datas) ?>)'>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('components/modal/createAddBarang'); ?>
<?= $this->include('components/barang/modalEditBarang'); ?>

<?= $this->endSection() ?>