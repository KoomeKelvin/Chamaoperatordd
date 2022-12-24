<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Duty;

class Priority extends Model
{
    use HasFactory;
   protected $guarded=[];
    
   protected $casts=['id'=>'string'];

   public function duties()
   {
       return $this->hasMany(Duty::class);
   }
}
