<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
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
		$this->db->select('konten.*, kategori.kategori');
		$this->db->from('konten');
		$this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
		$this->db->order_by('tanggal', 'DESC');
		$data['konten'] = $this->db->get()->result();
		$data['kategori'] = $this->db->get('kategori')->result();
		$this->template->load('layout/template_kontributor', 'kontributor/konten', $data);
	}
	function save()
	{
		$config['upload_path'] = './assets/images/konten/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 4096;

		$this->upload->initialize($config);
		$this->upload->do_upload('image');

		$image_data = $this->upload->data();
		$image_name = $image_data['file_name'];

		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$username = $data['ambil']->username;
		$thisday = date("Y-m-d");
		$data = array(
			'judul' => $this->input->post('judul'),
			'id_kategori' => $this->input->post('kategori'),
			'isi_konten' => $this->input->post('isi_konten'),
			'tanggal' => $thisday,
			'username' => $username,
			'foto' => $image_name

		);
		$this->db->insert('konten', $data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Menambahkan Konten Baru.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('kontenk'));
	}
	function delete($id)
	{
		$image_info = $this->db->get_where('konten', array('id_konten' => $id))->row();
		$image_path = './assets/images/konten/' . $image_info->foto;
		if (file_exists($image_path)) {
			unlink($image_path);
		}
		$this->db->where('id_konten', $id);
		$this->db->delete('konten');
		$this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Berhasil Menghapus Konten.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('kontenk'));
	}
	function edit($id)
	{
		$config['upload_path'] = './assets/images/konten/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 4096;

		$this->upload->initialize($config);
		$this->upload->do_upload('imagee');

		$image_data = $this->upload->data();
		$image_name = $image_data['file_name'];

		if ($image_name != NULL) {
			$image_info = $this->db->get_where('konten', array('id_konten' => $id))->row();
			$image_path = './assets/images/konten/' . $image_info->foto;
			if (file_exists($image_path)) {
				unlink($image_path);
			}

			$data = array(
				'judul' => $this->input->post('judul'),
				'id_kategori' => $this->input->post('kategori'),
				'isi_konten' => $this->input->post('isi_konten'),
				'foto' => $image_name
			);

			$this->db->where('id_konten', $id);
			$this->db->update('konten', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Konten.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		} else {
			$data = array(
				'judul' => $this->input->post('judul'),
				'id_kategori' => $this->input->post('kategori'),
				'isi_konten' => $this->input->post('isi_konten')
			);

			$this->db->where('id_konten', $id);
			$this->db->update('konten', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Konten.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		}

		return redirect(site_url('kontenk'));
	}
}
