<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Propiedad extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'propiedades';
    protected $fillable = ['tipo','direccion','comuna','ciudad','rol','valor_comercial','credito','estado','banco','monto','valor_cuota','cuotas_restantes'];

    public $timestamps = false;
}
