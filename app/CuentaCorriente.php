<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CuentaCorriente extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'cuentas_corriente';
    protected $fillable = ['banco','ejecutivo_sucursal','monto_linea','monto_tarjeta','estado', 'saldo_actual'];

    public $timestamps = false;
}
