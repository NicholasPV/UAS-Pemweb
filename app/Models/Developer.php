<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['developer', 'headquarters', 'description', 'founder', 'locationFounded', 'dateFounded', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
