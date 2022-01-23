<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clients;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 
        'name', 
        'description',
        'price'
    ];  

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
