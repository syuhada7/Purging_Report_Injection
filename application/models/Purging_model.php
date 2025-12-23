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

    public function get_mesin()
    {
        $this->db->from('mesin');
        $query = $this->db->get();
        return $query;
    }

    public function get_part_name()
    {
        return $this->db
            ->select('DISTINCT(name_pn)')
            ->get('parts')
            ->result();
    }

    public function get_model_by_part($part_name)
    {
        return $this->db
            ->select('DISTINCT(name_model)')
            ->where('name_pn', $part_name)
            ->get('parts')
            ->result();
    }

    public function get_pn_by_part_model($part_name, $model)
    {
        return $this->db
            ->select('DISTINCT(no_pn)')
            ->where('name_pn', $part_name)
            ->where('name_model', $model)
            ->get('parts')
            ->result();
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
