<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Flights extends Model
{
    use HasFactory;

    protected $table = 'flights';
    protected $primaryKey = 'id';

    public function airlines(): HasOne
    {
        return $this->hasOne(Airlines::class, 'carrier_code', 'aairlinecode');
    }

    public function sourceAirport(): HasOne
    {
        return $this->HasOne(Airports::class, 'iata', 'Source');
    }

    public function destinationAirport(): HasOne
    {
        return $this->HasOne(Airports::class, 'iata', 'Destination');
    }

}
