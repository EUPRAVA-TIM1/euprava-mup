<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $jmbg)
 * @method static whereNull(string $string)
 * @method static find($id)
 */
class DrivingLicense extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = "vozackaDozvola";
    protected $fillable = ['brojVozackeDozvole', 'katergorijeVozila', 'datumIzdavanja', 'datumIsteka',
        'brojKaznenihPoena', 'statusVozackeDozvole', 'odobrioSluzbenik', 'korisnik'];

}
