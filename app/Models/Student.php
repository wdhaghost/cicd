<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    use HasFactory;
}
