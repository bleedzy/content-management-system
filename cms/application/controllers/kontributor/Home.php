<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_u');
	}
	public function index()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$data['carousel'] = $this->db->get('carousel')->result();
		$this->template->load('layout/template_kontributor', 'admin/dashboard', $data);
	}
	public function saran()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$this->db->order_by('tanggal', 'DESC');
		$data['saran'] = $this->db->get('saran')->result();
		$this->template->load('layout/template_kontributor', 'kontributor/saran', $data);
	}
	public function galeri()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$data['galeri'] = $this->db->get('galeri')->result();
		$this->template->load('layout/template_kontributor', 'kontributor/galeri', $data);
	}
	function save_galeri()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		
		$config['upload_path'] = './assets/images/galeri/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 10000;

		$this->upload->initialize($config);
		$this->upload->do_upload('image');

		$image_data = $this->upload->data();
		$image_name = $image_data['file_name'];

		if ($image_name == NULL) {
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Foto Tidak Boleh Kosong.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			return redirect(site_url('galeri'));
		}

		$data = array(
			'judul' => $this->input->post('judul'),
			'foto' => $image_name,
			'tanggal' => date("Y-m-d"),
			'username' => $data['ambil']->username


		);
		$this->db->insert('galeri', $data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Menyimpan Gmabar Ke Galeri.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('_galeri'));
	}
	function edit_galeri($id)
	{
		$config['upload_path'] = './assets/images/galeri/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 10000;

		$this->upload->initialize($config);
		$this->upload->do_upload('imagee');

		$image_data = $this->upload->data();
		$image_name = $image_data['file_name'];

		if ($image_name != NULL) {
			$image_info = $this->db->get_where('galeri', array('id_galeri' => $id))->row();
			$image_path = './assets/images/galeri/' . $image_info->foto;
			if (file_exists($image_path)) {
				unlink($image_path);
			}

			$data = array(
				'judul' => $this->input->post('judul'),
				'foto' => $image_name
			);

			$this->db->where('id_galeri', $id);
			$this->db->update('galeri', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Isi Galeri.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		} else {
			$data = array(
				'judul' => $this->input->post('judul')
			);

			$this->db->where('id_galeri', $id);
			$this->db->update('galeri', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Isis Galeri.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		}

		return redirect(site_url('_galeri'));
	}
	function delete_galeri($id)
	{
		$image_info = $this->db->get_where('galeri', array('id_galeri' => $id))->row();
		$image_path = './assets/images/galeri/' . $image_info->foto;
		if (file_exists($image_path)) {
			unlink($image_path);
		}
		$this->db->where('id_galeri', $id);
		$this->db->delete('galeri');
		$this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Berhasil Menghapus Gambar Pada Galeri.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('_galeri'));
	}
}
