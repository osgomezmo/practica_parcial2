<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Role extends Model
{
    public function users(){
        $this->hasMany(User::class);
    }
}
