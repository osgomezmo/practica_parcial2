<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;
class Recipe extends Model
{ 
    public function user(){
        $this->belongsto(User::class);
    }
}
