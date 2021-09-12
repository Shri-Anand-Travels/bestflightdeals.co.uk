<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Airlines extends Model
{
    use HasFactory;

    protected $table = 'airlines';
    protected $primaryKey = 'id';

    public function flights(): BelongsTo
    {
        return $this->belongsTo(Flights::class, 'aairlinecode', 'carrier_code');
    }
}
