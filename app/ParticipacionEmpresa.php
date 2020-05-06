<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ParticipacionEmpresa extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'participacion_empresa';
    protected $fillable = ['razon_social','rut_sociedad','giro_sociedad','participacion','ventas_totales','estado'];

    public $timestamps = false;

}
