<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Proprietario;

class Animal extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $table = 'tbanimal';
    protected $primaryKey = 'id_animal';
    protected $guarded = 'id_animal';

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class, 'id_proprietario');
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class, 'id_raca');
    }
}
