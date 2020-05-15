<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FechaRespuesta extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'cliente_fecha_respuesta';
    protected $fillable = ['fecha', 'proceso'];
    
    public $timestamps = false;
   


}
