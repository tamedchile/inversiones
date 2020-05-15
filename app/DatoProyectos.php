<?php

namespace App;

use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DatoProyectos extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'datos_proyectos';
    protected $fillable = ['url','inmobiliaria','tipo_propiedad','piso_preferencia','orientacion','cantidad_baños','cantidad_dormitorios', 'metros_cuadrados','observaciones'];
    
	public $timestamps = false;
   


}
