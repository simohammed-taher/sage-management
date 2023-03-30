<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',
        'hire_date',
    ];

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
