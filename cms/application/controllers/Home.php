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
        $config['base_url'] = site_url('home/pag');
        $config['total_rows'] = $this->db->count_all('konten');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['suffix'] = '#konten';

        // style
        $config['full_tag_open'] = '<nav class="mt-4"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        $this->db->select('konten.*, kategori.kategori, user.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->join('user', 'konten.username = user.username');
        $this->db->limit($config['per_page'], $page);
        $data['konten'] = $this->db->get()->result();

        $data['konfig'] = $this->db->get('konfigurasi')->row();
        $data['carousel'] = $this->db->get('carousel')->result();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $this->template->load('layout/template', 'home', $data);
    }
    public function pag()
    {
        $config['base_url'] = site_url('home/pag');
        $config['total_rows'] = $this->db->count_all('konten');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['suffix'] = '#konten';

        // style
        $config['full_tag_open'] = '<nav class="mt-4"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        $this->db->select('konten.*, kategori.kategori, user.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->join('user', 'konten.username = user.username');
        $this->db->limit($config['per_page'], $page);
        $data['konten'] = $this->db->get()->result();
        $data['konfig'] = $this->db->get('konfigurasi')->row();
        $data['carousel'] = $this->db->get('carousel')->result();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $this->template->load('layout/template', 'home', $data);
    }
    public function kategori_konten($id)
    {
        $key = urldecode($id);
        $config['base_url'] = site_url('home/kategori_konten/' . $key);
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori', 'inner');
        $this->db->where('kategori.kategori', $key);
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;
        $config['uri_segment'] = 4;
        $config['suffix'] = '#konten';

        // style
        $config['full_tag_open'] = '<nav class="mt-4"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $page = $this->uri->segment(4);

        $this->db->select('konten.*, kategori.kategori, user.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->join('user', 'konten.username = user.username');
        $this->db->where('kategori.kategori', $key);
        $this->db->limit($config['per_page'], $page);
        $data['konten'] = $this->db->get()->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['konfig'] = $this->db->get('konfigurasi')->row();
        $data['key'] = $key;

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $this->template->load('layout/template', 'kategori', $data);
    }
    public function konten($key)
    {
        $this->db->select('konten.*, kategori.kategori, user.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->join('user', 'konten.username = user.username');
        $this->db->where('konten.id_konten', $key);
        $data['konten'] = $this->db->get()->row();
        $data['konfig'] = $this->db->get('konfigurasi')->row();
        $data['kategori'] = $this->db->get('kategori')->result();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $this->template->load('layout/template', 'konten', $data);
    }
    public function saran()
    {
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['konfig'] = $this->db->get('konfigurasi')->row();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $this->template->load('layout/template', 'saran', $data);
    }
    public function saran_simpan()
    {
        $data = array(
            'isi_saran' => $this->input->post('message'),
            'tanggal' => date("Y-m-d"),
            'nama' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );
        $this->db->insert('saran', $data);

        $this->session->set_flashdata('alert', '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Mengirim Saran.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

        redirect('');
    }
    public function galeri()
    {
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['konfig'] = $this->db->get('konfigurasi')->row();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $data['galeri'] = $this->db->get('galeri')->result();

        $this->template->load('layout/template', 'galeri', $data);
    }
    public function cari()
    {
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['konfig'] = $this->db->get('konfigurasi')->row();

        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['new'] = $this->db->get('konten')->result();

        $this->db->where('status', 'aktif');
        $data['aktif'] = $this->db->get('kategori')->row();
        $this->db->select('konten.*, kategori.*');
        $this->db->from('konten');
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
        $this->db->where('kategori.status', 'aktif');
        $this->db->order_by('tanggal', 'desc');
        $this->db->limit(5);
        $data['ket'] = $this->db->get()->result();

        $key = $this->input->get('search');
        $data['key'] = $key;
        if ($key != '') {
            $this->db->select('konten.*, kategori.kategori, user.nama, user.image');
            $this->db->from('konten');
            $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori');
            $this->db->join('user', 'konten.username = user.username');
            $this->db->group_start();
            $this->db->like('konten.judul', $key);
            $this->db->or_like('kategori.kategori', $key);
            $this->db->or_like('konten.isi_konten', $key);
            $this->db->or_like('konten.tanggal', $key);
            $this->db->or_like('konten.username', $key);
            $this->db->group_end();
            $data['pencarian'] = $this->db->get()->result();

            if (!empty($data['pencarian'])) {
                $this->template->load('layout/template', 'pencarian', $data);
            } else {
                $this->session->set_flashdata('alert', '
		            <div class="text-capitalize alert alert-danger alert-dismissible fade show" role="alert">
			            Hasil Untuk Pencarian ' . $key . ' Tidak Ada.
			            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>');
                redirect('');
            }
        } else {
            $this->session->set_flashdata('alert', '
		        <div class="alert alert-danger alert-dismissible fade show" role="alert">
			        Kolom Pencarian Tidak Boleh Kosong.
			        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		        </div>');
            redirect('');
        }
    }
}
