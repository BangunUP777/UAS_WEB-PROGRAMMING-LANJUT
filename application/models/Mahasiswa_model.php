<?php
class Mahasiswa_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_mahasiswa() {
        $query = $this->db->get('data_mahasiswa');
        return $query->result_array();
    }

    public function insert_mahasiswa($data) {
        return $this->db->insert('data_mahasiswa', $data);
    }

    public function get_mahasiswa_by_id($id) {
        $query = $this->db->get_where('data_mahasiswa', array('id' => $id));
        return $query->row_array();
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('data_mahasiswa', $data);
    }

    public function delete_mahasiswa($id) {
        return $this->db->delete('data_mahasiswa', array('id' => $id));
    }

    public function delete_all_mahasiswa() {
        return $this->db->empty_table('data_mahasiswa');
    }

    public function is_table_empty() {
        $query = $this->db->get('data_mahasiswa');
        return $query->num_rows() === 0;
    }

    public function reset_auto_increment() {
        $this->db->query("ALTER TABLE data_mahasiswa AUTO_INCREMENT = 1");
    }

    public function reorder_ids() {
        $result = $this->db->order_by('id')->get('data_mahasiswa')->result_array();
        $i = 1;
        foreach ($result as $row) {
            $this->db->where('id', $row['id']);
            $this->db->update('data_mahasiswa', array('id' => $i));
            $i++;
        }
        $this->reset_auto_increment();
    }
}
?>