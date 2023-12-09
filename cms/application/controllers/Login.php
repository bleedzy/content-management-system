<?php

class Login extends CI_Controller
{
    function index()
    {
        $this->load->view('login');
    }
    function register()
    {
        $this->load->view('register');
    }
    function create()
    {
        $username = $this->input->post('username');
        $this->db->from('user');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
			$this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username Sudah Digunakan.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect(site_url('login/register'));
		}
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;

        $this->upload->initialize($config);
        $this->upload->do_upload('image');

        $image_data = $this->upload->data();
        $image_name = $image_data['file_name'];
        $image_path = $image_data['full_path'];

        $image_size_info = getimagesize($image_path);
        $width = $image_size_info[0];
        $height = $image_size_info[1];

        if ($width == $height) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'level' => "Kontributor",
                'image' => $image_name
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Membuat Akun.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('login');
        } else{
            $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Ukuran Gambar Anda Bukan 1 : 1.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect(site_url('login/register'));
        }
    }
    function log()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = array(
            'username' => $username,
            'password' => md5($password)
        );
        $user = $this->db->get_where('user', $data)->row();
        $this->session->set_userdata('id', $user->id_user);
        if ($user != NULL) {
            date_default_timezone_set('Asia/Jakarta');

            $dateTime = new DateTime();
            
            $formattedTime = date('H:i:s', $dateTime->getTimestamp());
            
            $this->db->where('id_user',  $user->id_user);
            $this->db->update('user', array('recent_login' => date('Y-m-d H:i:s')));
            switch ($user->level) {
                case "Admin":
                    redirect('admin');
                    break;
                case "Kontributor":
                    redirect('kontributor');
                    break;
            }
        } else {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username Atau Password Salah.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('login');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    function profile()
    {
        $id = $this->session->userdata('id');
        $data['fetch'] = $this->db->get_where('user', array('id_user' => $id))->row();
        $this->load->view('layout/profile', $data);
    }
    function update_profile()
    {
        $id = $this->session->userdata('id');
        $data['fetch'] = $this->db->get_where('user', array('id_user' => $id))->row();
        $this->load->view('layout/update_profile', $data);
    }
    function update()
    {
        $id = $this->session->userdata('id');
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;

        $this->upload->initialize($config);
        $this->upload->do_upload('image');

        $image_data = $this->upload->data();
        $image_name = $image_data['file_name'];
        $image_path = $image_data['full_path'];

        $image_size_info = getimagesize($image_path);
        $width = $image_size_info[0];
        $height = $image_size_info[1];

        if ($width == $height) {
            if ($image_name != NULL) {
                $image_info = $this->db->get_where('user', array('id_user' => $id))->row();
                $image_path = './assets/images/upload/' . $image_info->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                $data = array(
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama'),
                    'image' => $image_name
                );

                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                redirect('login/profile');
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama')
                );

                $this->db->where('id_user', $id);
                $this->db->update('user', $data);
                redirect('login/profile');
            }
        }
    }
    function back()
    {
        $id = $this->session->userdata('id');
        $user = $this->db->get_where('user', array('id_user' => $id))->row();
        if ($user != NULL) {
            switch ($user->level) {
                case "Admin":
                    redirect('admin');
                    break;
                case "Kontributor":
                    redirect('kontributor');
                    break;
            }
        }
    }
}
