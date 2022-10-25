<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;

class Product extends Model
{
    protected $primaryKey = 'product_number';
    protected $fillable = ['name', 'description', 'stock_quantity', 'price', 'partcipant_id'];
    // public function participant() {
    //     return $this->belongsTo(Participant::class);
    // }

}  
