<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Administrator extends Model
{
    protected $fillable = ['first_name', 'last_name', 'Email', 'telephone_number', 'gender', 'password'];

}
