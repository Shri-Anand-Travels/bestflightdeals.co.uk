<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Airports extends Model
{
    use HasFactory;

    protected $table = 'airports';
    protected $primaryKey = 'id';

    public function flightSource(): BelongsTo
    {
        return $this->belongsTo(Flights::class, 'Source', 'iata');
    }

    public function flightDestination(): BelongsTo
    {
        return $this->belongsTo(Flights::class, 'Destination', 'iata');
    }
}
