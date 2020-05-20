<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestLogs extends Model
{
    //
    protected $table = 'requestlogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'status_code',
        'count'
    ];
}
