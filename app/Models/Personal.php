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
    protected function specialities(): Attribute
    {
        return Attribute::make(
            get: fn () => DB::table('specialities')->whereIn('id', function ($query) {
                $query->from('personal_specialities')->where('personal_id', $this->id)->select('speciality_id')->get()->toArray();
            })->get()
        );
    }
    protected function services(): Attribute
    {
        return Attribute::make(
            get: fn () => DB::table('services')->whereIn('id', function ($query) {
                $query->from('personal_services')->where('personal_id', $this->id)->select('service_id')->get()->toArray();
            })->get()
        );
    }
}
