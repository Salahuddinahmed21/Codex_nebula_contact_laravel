<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'table_clients';

    protected $fillable = ['id', 'name','email','phonenumber','country','is_enable', 'created_at', 'updated_at', 'deleted_at'];
    
}
