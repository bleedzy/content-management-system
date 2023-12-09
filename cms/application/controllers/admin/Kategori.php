<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_u');
    }
    public function index()
    {
        $ambil = $this->session->userdata('id');
        $data['kategori'] = $this->model_u->kategori();
        $data['ambil'] = $this->model_u->read_by_id($ambil);
        switch ($data['ambil']->level) {
            case "Admin":
                $this->template->load('layout/template_admin', 'admin/kategori', $data);
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
        $this->model_u->simpan_kategori();
        $this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Menambahkan Kategori Baru.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('kategori'));
    }
    function update($id)
    {
        $this->model_u->update_kategori($id);
        $this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Mengubah Kategori.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('kategori'));
    }
    function delete($id)
    {
        $this->model_u->delete_kategori($id);
        $this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Berhasil Menghapus Kategori.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
        return redirect(site_url('kategori'));
    }
    public function status($id)
    {
        $data = array(
            'status' => 'nonaktif'
        );

        $this->db->where('status', 'aktif');
        $this->db->update('kategori', $data);

        if ($this->input->post('status') == 'on') {
            $data = array(
                'status' => 'aktif'
            );

            $this->db->where('id_kategori', $id);
            $this->db->update('kategori', $data);
        }

        redirect('kategori');
    }
}
