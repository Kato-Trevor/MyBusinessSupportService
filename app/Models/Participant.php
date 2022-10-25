<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Participant extends Model
{
    protected $primaryKey = 'participant_id';
    protected $fillable = ['name', 'password', 'date_of_birth', 'points' ];
    public function product() {
        return $this->hasOne(Product::class);
    }
}

