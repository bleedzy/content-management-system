<?php 
 
class Model_u extends CI_Model{
    function user(){
		return $this->db->get('user')->result();
	}
    function kategori(){
		return $this->db->get('kategori')->result();
	}
    function simpan_user(){
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

        if($width == $height){
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
                'image' => $image_name  
            );
    
            $this->db->insert('user',$data);
        }else{
            $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Ukuran Gambar Anda Bukan 1 : 1.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect(site_url('user'));
        }
    }
    function simpan_kategori(){
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
    
        $this->db->insert('kategori',$data);

    }
    function update_user($id){
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;

        $this->upload->initialize($config); 
        $this->upload->do_upload('imagee');

        $image_data = $this->upload->data();
        $image_name = $image_data['file_name'];
        $image_path = $image_data['full_path'];

        $image_size_info = getimagesize($image_path);
        $width = $image_size_info[0];
        $height = $image_size_info[1];

        if($width == $height){
            if($image_name != NULL){
                $image_info = $this->db->get_where('user', array('id_user' => $id))->row();
                $image_path = './assets/images/upload/'.$image_info->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                $data = array(
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama'),
                    'image' => $image_name         
                );
        
                $this->db->where('id_user', $id);
                $this->db->update('user',$data);
            }else{
                $data = array(
                    'username' => $this->input->post('username'),
                    'nama' => $this->input->post('nama')
                );
        
                $this->db->where('id_user', $id);
                $this->db->update('user',$data);
            }
        }else{
            $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Ukuran Gambar Anda Bukan 1 : 1.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect(site_url('user'));
        }
    }
    function update_kategori($id){
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
    
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori',$data);

    }
    function delete_user($id){
        $image_info = $this->db->get_where('user', array('id_user' => $id))->row();
		$image_path = './assets/images/upload/'.$image_info->image;
        if (file_exists($image_path)) {
            unlink($image_path);
		}
		$this->db->where('id_user', $id);
        $this->db->delete('user');
    }
    function delete_kategori($id){
        $this->db->delete('kategori', array('id_kategori' => $id));
    }
    function read_by_id($id){
        $query = $this->db->get_where('user', array('id_user' => $id));
        return $query->row();
    }
    function check()
    {
        $username = $this->input->post('username');
        $this->db->from('user');
        $this->db->where('username', $username);
        return $this->db->get()->result_array();
    }
}