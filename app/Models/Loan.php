<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
    use HasFactory;
}
