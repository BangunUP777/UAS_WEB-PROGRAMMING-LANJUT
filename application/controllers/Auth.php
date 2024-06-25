<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user($username);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $userdata = array(
                        'username' => $user['username'],
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($userdata);
                    redirect('mahasiswa');
                } else {
                    $this->session->set_flashdata('error', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan');
                redirect('auth');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
