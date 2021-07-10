<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLampiran extends Model
{
    protected $allowedFields        = ['lampiran'];

    public function AllData()
    {
        return $this->db->table('tbl_lampiran')
            ->orderBy('id_lampiran', 'ASC')
            ->get()->getResultArray();
    }
    public function tambah($data)
    {
        $this->db->table('tbl_lampiran')->insert($data);
    }
    public function ubah($data)
    {
        $this->db->table('tbl_lampiran')
            ->where('id_lampiran', $data['id_lampiran'])
            ->update($data);
    }
    public function hapus($data)
    {
        $this->db->table('tbl_lampiran')
            ->where('id_lampiran', $data['id_lampiran'])->delete($data);
    }
}
