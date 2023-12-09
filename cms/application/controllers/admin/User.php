<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_u');
    }
    public function index()
    {
        $ambil = $this->session->userdata('id');
        $data['user'] = $this->model_u->user();
        $data['ambil'] = $this->model_u->read_by_id($ambil);
        switch ($data['ambil']->level) {
            case "Admin":
                $this->template->load('layout/template_admin', 'admin/user', $data);
                break;
            case "Kontributor":
                redirect('kontributor');
                break;
            default:
                redirect('login');
        }
    }
    function save()
    {
		$cek = $this->model_u->check();
        if ($cek <> NULL) {
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username Sudah Digunakan.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect(site_url('user'));
		}
        $this->model_u->simpan_user();
        $this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Menyimpan User Baru.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('user'));
    }
    function update($id)
    {
        $this->model_u->update_user($id);
        $this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Merubah User.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('user'));
    }
    function delete($id)
    {
        $this->model_u->delete_user($id);
        $this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Berhasil Menghapus User.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('user'));
    }
}
