<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especie;

class Raca extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbraca';
    protected $primaryKey = 'id_raca';
    protected $guarded = 'id_raca';

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

}
