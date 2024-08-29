<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    // protected $fillable = [
    //     'title',
    //     'salary',
    //     'creator_name',
    // ];
}
