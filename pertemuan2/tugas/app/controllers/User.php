<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar User';
        $data['users'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('list', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}

?>