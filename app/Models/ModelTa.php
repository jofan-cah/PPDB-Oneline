<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    protected $allowedFields        = ['ta'];
    public function AllData()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('ta', 'ASC')
            ->get()->getResultArray();
    }
    public function tambah($data)
    {
        return $this->db->table('tbl_ta')->insert($data);
    }
    public function ubah($data)
    {
        return $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }
    public function resetStatus()
    {
        $this->db->table('tbl_ta')
            ->update(['status' => 0]);
    }
    public function statusTA()
    {
        return $this->db->table('tbl_ta')
            ->where('status', '1')
            ->get()
            ->getRowArray();
    }
}
