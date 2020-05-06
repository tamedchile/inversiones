<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Conyuge extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'conyuge';
    protected $fillable = ['pnombre','snombre','apellidos','rut','fnacimiento','nacionalidad','nvl_educacional','ocupacional','ingresos','estado'];

    public $timestamps = false;
}
