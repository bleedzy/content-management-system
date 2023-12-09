<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_u');
    }
    public function index()
	{
		$data['konfig'] = $this->db->get('konfigurasi')->row();
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/konfigurasi', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
	}
	function update(){
		$id = 1;
        $data = array(
            'judul_web' => $this->input->post('judul'),
            'profil_web' => $this->input->post('profile'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'twitter' => $this->input->post('twitter'),
            'whatsapp' => $this->input->post('whatsapp')
        );
    
        $this->db->where('id', $id);
        $this->db->update('konfigurasi',$data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Mengubah Konfigurasi.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
		return redirect('konfigurasi');
    }
}