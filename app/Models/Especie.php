<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbespecie';
    protected $primaryKey = 'id_especie';
    protected $guarded = 'id_especie';
}
