<?php

namespace App\Models;

use CodeIgniter\Model;

class ManusiaModel extends Model
{
    protected $table      = 'manusia';
    protected $useTimestamps = true;
    protected $allowedFields=['nama', 'slug', 'alamat', 'no_telp', 'foto', 'jeniskelamin'];

    public function getManusia($slug= false)
    {
        if($slug==false){
            return $this->findAll();
        }

        return $this->where(['slug'=> $slug])->first();
    }
}