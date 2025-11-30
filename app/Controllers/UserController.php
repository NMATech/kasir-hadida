<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        helper(['form', 'url']);
    }

    public function index()
    {
        // Check if user is admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak. Hanya admin yang dapat mengelola user');
        }

        $data = [
            'title' => 'Kelola User',
            'users' => $this->userModel->findAll()
        ];

        return view('pages/users', $data);
    }

    public function addUser()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'role' => $this->request->getPost('role'),
            'is_active' => 1
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to('/users')->with('success', 'User berhasil ditambahkan');
        } else {
            $errors = $this->userModel->errors();
            $errorMessage = implode(', ', $errors);
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $errorMessage)->withInput();
        }
    }

    public function editUser($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'full_name' => $this->request->getPost('full_name'),
            'role' => $this->request->getPost('role')
        ];

        // Only update password if provided
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $data['password'] = $newPassword;
        }

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/users')->with('success', 'User berhasil diupdate');
        } else {
            $errors = $this->userModel->errors();
            $errorMessage = implode(', ', $errors);
            return redirect()->back()->with('error', 'Gagal mengupdate user: ' . $errorMessage);
        }
    }

    public function deleteUser($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        // Prevent deleting own account
        if ($id == session()->get('user_id')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus user');
        }
    }

    public function toggleStatus($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        // Prevent deactivating own account
        if ($id == session()->get('user_id')) {
            return redirect()->back()->with('error', 'Tidak dapat menonaktifkan akun sendiri');
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        $newStatus = $user['is_active'] == 1 ? 0 : 1;

        if ($this->userModel->update($id, ['is_active' => $newStatus])) {
            $message = $newStatus == 1 ? 'User berhasil diaktifkan' : 'User berhasil dinonaktifkan';
            return redirect()->to('/users')->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah status user');
        }
    }
}
