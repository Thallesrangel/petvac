<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbusuario';
    protected $primaryKey = 'id_usuario';
    protected $guarded = 'id_usuario';
}
