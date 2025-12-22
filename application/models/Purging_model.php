<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purging_model extends CI_Model
{
    private $table = 'Catatan';

    public function get($id = null)
    {
        $this->db->from('catatan');
        if ($id != null) {
            $this->db->where('id_catat', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_next_id()
    {
        $this->db->select_max('id_catat');
        $query = $this->db->get('catatan');
        $result = $query->row();
        return $result ? $result->id_catat + 1 : 1;
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
