<?php

namespace App\Models;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $vehicleType
 * @method static where(string $string, false $false)
 * @method static find($id)
 * @method static whereNull(string $string)
 */
class Vehicle extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = "vozilo";
    protected $fillable = [
        'marka',
        'model',
        'godina',
        'boja',
        'regBroj',
        'snagaMotora',
        'maksimalnaBrzina',
        'brojSedista',
        'tezina',
        'tipVozila',
        'statusRegistracije',
        'prijavljenaKradja',
        'odobrioSluzbenik',
        'korisnik'
    ];


}
