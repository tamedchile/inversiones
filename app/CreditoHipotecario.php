<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CreditoHipotecario extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'credito_hipotecario';
    protected $fillable = ['banco','monto','valor_cuota','cuotas_restantes','estado'];

    public $timestamps = false;
    
}
