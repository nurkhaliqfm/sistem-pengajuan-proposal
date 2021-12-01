<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $useTimestamps = true;
    protected $allowedFields = ['nik', 'name', 'team', 'village', 'district', 'size', 'type'];

    public function search($keyword)
    {
        return $this->table('member')->like('name', $keyword);
    }
}
