<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function userLogin($data)
    {
        $valid = false;
        $result = $this->db->table('tbl_user')
        ->where(['nik' => $data['username']])
        ->get()->getRow();

        if ($result) {
            $checkPassword = password_verify($data['password'], $result->password);
            if ($checkPassword) {
                return $result;
            }
        }
        return $valid;
    }

    public function getDataUser($id)
    {
        return $this->db->table('tbl_user')
        ->join('tbl_warga', 'tbl_warga.id_warga=tbl_user.nik')
        ->where(['tbl_user.nik' => $id])
        ->get()->getRowArray();
    }
}
