<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'query',
        'source',
        'destination',
        'adults',
        'children',
        'infants',
        'carrier',
        'cabin',
        'depart_date',
        'return_date',
        'enquiry_type',
        'ip',
        'reference_id',
        'country',
        'accept_privacy'
    ];
}
