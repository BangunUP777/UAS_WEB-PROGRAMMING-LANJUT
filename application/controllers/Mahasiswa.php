<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Mahasiswa_model');
    }

    public function index() {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
        $data['logged_in'] = $this->session->userdata('logged_in');
        $this->load->view('mahasiswa/index', $data);
    }

    public function add() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('mahasiswa/add');
        } else {
            redirect('auth/login');
        }
    }

    public function add_action() {
        if ($this->session->userdata('logged_in')) {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'foto' => $this->upload_foto()
            );

            $this->Mahasiswa_model->insert_mahasiswa($data);
            redirect('mahasiswa');
        } else {
            redirect('auth/login');
        }
    }

    public function edit($id) {
        if ($this->session->userdata('logged_in')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_id($id);
            $this->load->view('mahasiswa/edit', $data);
        } else {
            redirect('auth/login');
        }
    }

    public function update($id) {
        if ($this->session->userdata('logged_in')) {
            $data = array(
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'foto' => $this->upload_foto()
            );

            $this->Mahasiswa_model->update_mahasiswa($id, $data);
            redirect('mahasiswa');
        } else {
            redirect('auth/login');
        }
    }

    public function delete($id) {
        if ($this->session->userdata('logged_in')) {
            $this->Mahasiswa_model->delete_mahasiswa($id);
            $this->Mahasiswa_model->reorder_ids();
            redirect('mahasiswa');
        } else {
            redirect('auth/login');
        }
    }

    public function delete_all() {
        if ($this->session->userdata('logged_in')) {
            $this->Mahasiswa_model->delete_all_mahasiswa();
            $this->Mahasiswa_model->reset_auto_increment();
            redirect('mahasiswa');
        } else {
            redirect('auth/login');
        }
    }

    private function upload_foto() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            return $this->input->post('old_foto'); // Return old photo if new one is not uploaded
        } else {
            return $this->upload->data('file_name');
        }
    }
}
?>
