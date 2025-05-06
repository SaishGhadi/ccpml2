<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlFeature extends Model
{
    use HasFactory;

    protected $table = 'ml_features';

    protected $fillable = [
        'jurisdictions',
        'carbon_index',
        'dispersion',
        'upload_date',
    ];

    public $timestamps = true; // for created_at and updated_at
}
