<?php

class Login_model extends CI_Model
{
  public function getLogin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['username' => $username])->row_array();

    if ($user != null) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'username' => $user['username'],
          'lvl_user' => $user['lvl_user']
        ];
        $this->session->set_userdata($data);
        if ($user['lvl_user'] == 1) {
          redirect('owner');
        } elseif ($user['lvl_user'] == 2) {
          redirect('admin');
        } elseif ($user['lvl_user'] == 3) {
          redirect('akuntan');
        } elseif ($user['lvl_user'] == 4) {
          redirect('karyawan');
        }
      } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert"<strong>Password</strong> salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('welcome/login');
      }
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert"<strong>Username</strong> tidak tersedia!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('welcome/login');
    }
  }
}
