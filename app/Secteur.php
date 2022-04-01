<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $notFoundMessage = 'la page est introuvable .';
    protected $fillable = [
        'label'
    ];
}
