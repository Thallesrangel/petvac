<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbproprietario';
    protected $primaryKey = 'id_proprietario';
    protected $guarded = 'id_proprietario';
}
