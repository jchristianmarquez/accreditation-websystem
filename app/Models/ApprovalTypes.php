<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'approvalID',
        'approver'
    ];

    protected $table = 'approval_types';

}
