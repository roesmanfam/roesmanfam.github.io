<?php

namespace App\Models;

use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'password', 'role', 'total_tabungan'
    ];

    public function transfer(){
        return $this->hasMany(Transfer::class);
    }
}
