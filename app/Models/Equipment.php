<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{

    public function loans()
    {
        return $this->belongsToMany(Loan::class);
    }
    use HasFactory;
    protected $table = 'equipments';
}
