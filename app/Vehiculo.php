<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vehiculo extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'vehiculos';
    protected $fillable = ['marca','modelo','año','patente','valor','estado'];

	public $timestamps = false;
	
}
