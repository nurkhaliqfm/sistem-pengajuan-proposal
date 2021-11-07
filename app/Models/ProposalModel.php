<?php

namespace App\Models;

use CodeIgniter\Model;

class ProposalModel extends Model
{
    protected $table = 'proposal';
    protected $useTimestamps = true;
    protected $allowedFields = ['account', 'username', 'project', 'slug', 'description', 'address', 'document', 'team', 'status', 'note', 'send_time'];
}
