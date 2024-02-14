<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_query extends Model
{
    use HasFactory;
    protected $table = 'query_info';

    protected $fillable = ['id', 'client_id','formData','tpintegration','technology','sdate','edate', 'images','created_at', 'updated_at', 'deleted_at'];
    
}
