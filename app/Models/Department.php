<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function branches(){
        return $this->belongsTo(Branch::class);
    }
    use HasFactory;
}
