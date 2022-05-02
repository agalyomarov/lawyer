<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'personals';
    public $timestamps = false;
    protected function publishing(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => boolval($value),
            set: fn ($value) => boolval($value),
        );
    }
    protected function speciality(): Attribute
    {
        return Attribute::make(
            get: fn () => DB::table('specialities')->whereIn('id', function ($query) {
                $query->from('personal_speciality')->where('personal_id', $this->id)->select('speciality_id')->get()->toArray();
            })->get()
        );
    }
}
