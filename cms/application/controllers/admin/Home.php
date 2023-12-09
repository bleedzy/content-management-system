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
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/dashboard', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
	}
	public function konten()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$this->db->select('konten.*, kategori.kategori');
		$this->db->from('konten');
		$this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
		$this->db->order_by('tanggal', 'DESC');
		$data['konten'] = $this->db->get()->result();
		$data['kategori'] = $this->db->get('kategori')->result();
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/konten', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
	}
	function save_konten()
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

		return redirect(site_url('konten'));
	}
	function delete_konten($id)
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

		return redirect(site_url('konten'));
	}
	function edit_konten($id)
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

		return redirect(site_url('konten'));
	}
	public function carousel()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$data['carousel'] = $this->db->get('carousel')->result();
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/carousel', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
	}
	function save_carousel()
	{
		$config['upload_path'] = './assets/images/carousel/';
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

			return redirect(site_url('carousel'));
		}

		$data = array(
			'judul' => $this->input->post('judul'),
			'foto' => $image_name

		);
		$this->db->insert('carousel', $data);
		$this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Menyimpan Carousel Baru.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('carousel'));
	}
	function delete_carousel($id)
	{
		$image_info = $this->db->get_where('carousel', array('id_carousel' => $id))->row();
		$image_path = './assets/images/carousel/' . $image_info->foto;
		if (file_exists($image_path)) {
			unlink($image_path);
		}
		$this->db->where('id_carousel', $id);
		$this->db->delete('carousel');
		$this->session->set_flashdata('alert', '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Berhasil Menghapus Carousel.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

		return redirect(site_url('carousel'));
	}
	function edit_carousel($id)
	{
		$config['upload_path'] = './assets/images/carousel/';
		$config['allowed_types'] = '*';
		$config['max_size'] = 10000;

		$this->upload->initialize($config);
		$this->upload->do_upload('imagee');

		$image_data = $this->upload->data();
		$image_name = $image_data['file_name'];

		if ($image_name != NULL) {
			$image_info = $this->db->get_where('carousel', array('id_carousel' => $id))->row();
			$image_path = './assets/images/carousel/' . $image_info->foto;
			if (file_exists($image_path)) {
				unlink($image_path);
			}

			$data = array(
				'judul' => $this->input->post('judul'),
				'foto' => $image_name
			);

			$this->db->where('id_carousel', $id);
			$this->db->update('carousel', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Carousel.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		} else {
			$data = array(
				'judul' => $this->input->post('judul')
			);

			$this->db->where('id_carousel', $id);
			$this->db->update('carousel', $data);
			$this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Berhasil Mengubah Carousel.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
		}

		return redirect(site_url('carousel'));
	}
	public function saran()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$this->db->order_by('tanggal', 'DESC');
		$data['saran'] = $this->db->get('saran')->result();
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/saran', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
	}
	public function saran_hapus()
	{
		$cek = $this->input->post('hapus');
		if ($cek) {
			$items_to_delete = $this->input->post('pilih');
			if (!empty($items_to_delete)) {
				$this->db->where_in('id_saran', $items_to_delete);
				$this->db->delete('saran');
				$this->session->set_flashdata('alert', '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil Mengapus Saran.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			} else {
				$this->session->set_flashdata('alert', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Tidak Ada Saran Yang Diplilih.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			}
			return redirect(site_url('_saran'));
		}
	}
	public function galeri()
	{
		$ambil = $this->session->userdata('id');
		$data['ambil'] = $this->model_u->read_by_id($ambil);
		$data['galeri'] = $this->db->get('galeri')->result();
		switch ($data['ambil']->level) {
			case "Admin":
				$this->template->load('layout/template_admin', 'admin/galeri', $data);
				break;
			case "Kontributor":
				redirect('kontributor');
				break;
			default:
				redirect('login');
		}
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

		return redirect(site_url('galeri'));
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

		return redirect(site_url('galeri'));
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

		return redirect(site_url('galeri'));
	}
}
