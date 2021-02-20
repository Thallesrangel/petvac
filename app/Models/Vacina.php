<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbvacina';
    protected $primaryKey = 'id_vacina';
    protected $guarded = 'id_vacina';
}
