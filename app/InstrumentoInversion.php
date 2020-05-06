<?php

namespace App;

use App\Observers\ClientDetailObserver;
use App\Scopes\CompanyScope;
use App\Traits\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InstrumentoInversion extends BaseModel
{
    use Notifiable, CustomFieldsTrait;

    protected $table = 'instrumentos_inversion';
    protected $fillable = ['tipo','valor','estado'];

    public $timestamps = false;
    
}
