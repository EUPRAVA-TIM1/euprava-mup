<?php

namespace App\Models;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $vehicleType
 */
class Vehicle extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = "vehicles";
    protected $fillable = ['brand', 'model', 'year', 'color', 'engine_power', 'max_speed', 'num_of_seats', 'weight',
        'vehicle_type', 'user_id'];
}
