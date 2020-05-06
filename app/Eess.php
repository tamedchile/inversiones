<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Eess extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'eess';
    protected $fillable = ['motivacion','tipo_v_motivacion','cant_v_motivacion','rama','fecha_ingreso_rama','nvl_educacional','lugar_estudio','titulo','año_egreso','estado_civil','regimen_matrimonial','personas_cargo','sueldo','otros_ingresos','concepto_ingreso','total_ingreso','vehiculos','propiedades','participacion_empresa','cuenta_corriente', 'credito_consumo','estado','estado_eduacion','estado_motivacion','estado_dependencia','estado_ingresos','paso','monto_preliminar'];
    
	public $timestamps = false;
   


}
