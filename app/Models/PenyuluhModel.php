<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyuluhModel extends Model
{
    protected $table = 'penyuluh';
    protected $useTimestamps = true;
    protected $allowedFields = ['full_name', 'slug', 'nik', 'status_user', 'phone', 'team', 'address'];
}
