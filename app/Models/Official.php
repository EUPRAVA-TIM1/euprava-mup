<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $jmbg)
 */
class Official extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = "sluzbenik";
    protected $fillable = ['sluzbenik'];
}
