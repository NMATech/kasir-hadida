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
    <p class="text-sm"><?= date('d F Y'); ?></p>
</div>

<div class="w-max z-10 flex items-center gap-2 relative mt-10">
    <button class="flex items-center gap-2 text-white bg-emerald-500 hover:bg-emerald-500/90 cursor-pointer rounded-lg p-2" onclick="showModalAddUser()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <p>Tambah User</p>
    </button>
</div>

<div class="mt-[-50px]">
    <table id="tableUsers" class="min-w-full border border-gray-200 bg-white text-sm">
        <thead class="bg-sky-500 text-white">
            <tr>
                <th class="px-4 py-3 font-medium" style="text-align: center;">No</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Username</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Email</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Nama Lengkap</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Role</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Status</th>
                <th class="px-4 py-3 font-medium" style="text-align: center;">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            <?php foreach ($users as $idx => $user): ?>
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-3" style="text-align: center;"><?= $idx + 1; ?></td>
                    <td class="px-4 py-3"><?= esc($user['username']); ?></td>
                    <td class="px-4 py-3"><?= esc($user['email']); ?></td>
                    <td class="px-4 py-3"><?= esc($user['full_name']); ?></td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold <?= $user['role'] == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' ?>">
                            <?= ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold <?= $user['is_active'] == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                            <?= $user['is_active'] == 1 ? 'Aktif' : 'Nonaktif' ?>
                        </span>
                    </td>
                    <td class="flex justify-center items-center gap-3 px-4 py-3">
                        <button class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600" onclick="showModalEditUser(<?= htmlspecialchars(json_encode($user), ENT_QUOTES, 'UTF-8') ?>)">
                            Edit
                        </button>

                        <?php if ($user['id'] != session()->get('user_id')): ?>
                            <form action="<?= base_url('users/toggle-status/' . $user['id']) ?>" method="post" style="display: inline;">
                                <button type="submit" class="px-3 py-1 text-white <?= $user['is_active'] == 1 ? 'bg-orange-500 hover:bg-orange-600' : 'bg-green-500 hover:bg-green-600' ?> rounded-md">
                                    <?= $user['is_active'] == 1 ? 'Nonaktifkan' : 'Aktifkan' ?>
                                </button>
                            </form>

                            <?php
                            $datas = [
                                'headline' => 'User',
                                'nama' => $user['username'],
                                'url' => 'users/delete/' . $user['id']
                            ];
                            ?>
                            <button class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600" onclick='showModalDelete(<?= json_encode($datas) ?>)'>
                                Delete
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/users/modalAddUser'); ?>
<?= $this->include('components/users/modalEditUser'); ?>
<?= $this->endSection() ?>