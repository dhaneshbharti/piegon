<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class Flipkart extends Model
{
    use HasFactory;
    protected $table = 'ecom';
    protected $guarded = [];

    public function worker()
    {
        return $this->belongsTo(Roles::class, 'r_id','id');
    }
}
