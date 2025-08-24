<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class KelolaAdmin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Menampilkan halaman kelola admin
    public function index()
    {
        $id = session()->get('admin_id'); // ambil id admin dari session
        $data['admin'] = $this->adminModel->find($id);
        return view('admin/kelola_admin', $data);
    }

    // Update profil (nama & email)
    public function updateProfile()
    {
        $id = session()->get('admin_id');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');

        $this->adminModel->update($id, [
            'nama' => $nama,
            'email' => $email
        ]);

        session()->setFlashdata('success_profile', 'Profil berhasil diperbarui.');
        return redirect()->to('/admin/kelola-admin');
    }

    // Update password
    public function updatePassword()
    {
        $id = session()->get('admin_id');
        $old_password = $this->request->getPost('old_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $admin = $this->adminModel->find($id);

        if (!password_verify($old_password, $admin['password'])) {
            session()->setFlashdata('error_password', 'Password lama salah.');
            return redirect()->to('/admin/kelola-admin');
        }

        if ($new_password !== $confirm_password) {
            session()->setFlashdata('error_password', 'Konfirmasi password baru tidak cocok.');
            return redirect()->to('/admin/kelola-admin');
        }

        $this->adminModel->update($id, [
            'password' => password_hash($new_password, PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success_password', 'Password berhasil diperbarui.');
        return redirect()->to('/admin/kelola-admin');
    }
}
