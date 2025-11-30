<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        helper(['form', 'url']);
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        return view('pages/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session->setFlashdata('error', 'Username dan password harus diisi');
            return redirect()->back()->withInput();
        }

        // Verify credentials
        $user = $this->userModel->verifyPassword($username, $password);

        if (!$user) {
            $session->setFlashdata('error', 'Username atau password salah');
            return redirect()->back()->withInput();
        }

        // Check if user is active
        if ($user['is_active'] != 1) {
            $session->setFlashdata('error', 'Akun Anda tidak aktif. Hubungi administrator');
            return redirect()->back();
        }

        // Set session data
        $sessionData = [
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        $session->set($sessionData);
        $session->setFlashdata('success', 'Login berhasil! Selamat datang ' . $user['full_name']);

        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('success', 'Anda telah logout');
        return redirect()->to('/login');
    }
}
