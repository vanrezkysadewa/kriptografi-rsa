<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Perawat_bidan_model extends CI_Model
{
    protected $table = 'perawat_bidan';
    protected $primary_key = 'id';

    // ambil data
    public function getData($id = false, $allData = TRUE)
    {
        if ($id !== false) {
            return $this->db->get_where($this->table, [$this->primary_key => $id])->row_array();
        }
        $this->db->order_by($this->primary_key, 'DESC');

        if ($allData) {
            return $this->db->get($this->table)->result_array();
        }
        return [];
    }

    //simpan atau update data 
    public function saveData($id = false, $data = [])
    {
        if ($id === false) {
            return $this->db->insert($this->table, $data);
        }

        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }

    public function deleteData($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table);
    }
}
