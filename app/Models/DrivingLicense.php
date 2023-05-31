<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $jmbg)
 */
class DrivingLicense extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = "driving_licenses";
    protected $fillable = ['driver_license_num', 'categories', 'issue_date', 'expiry_date', 'penalty_points', 'status',
        'official_id', 'user_id'];
}
