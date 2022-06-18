<?php

class Akuntan_model  extends CI_Model
{
  public function editProfil()
  {
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $data = [
      'username' => $this->input->post('username', true),
      'nama' => $this->input->post('nama', true),
      'jk' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat', true),
      'no_hp' => $this->input->post('nohp', true),
      'email' => $this->input->post('email', true),
      'nik' => $this->input->post('nik', true)
    ];

    // cek upload file
    $uploadimg = $_FILES['img']['name'];

    if ($uploadimg) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2560';
      $config['upload_path'] = './assets/img/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('img')) {
        $fotolama = $data['user']['foto'];
        if ($fotolama != 'default.png') {
          unlink(FCPATH . 'assets/img/' . $fotolama);
        }

        $fotobaru = $this->upload->data('file_name');
        $this->db->set('foto', $fotobaru);
      } else {
        echo  $this->upload->display_errors();
      }
    }

    $this->db->set($data);
    $this->db->update('users');
  }
}
