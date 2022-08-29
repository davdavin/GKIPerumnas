<?php

class M_Request extends CI_Model
{

    public function insert_record($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
