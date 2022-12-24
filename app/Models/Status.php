<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Duty;
use Illuminate\Http\Request;

class Status extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    protected $table = 'statuses';
    public function duty()
    {
        return $this->belongsTo(Duty::class);
    }

    protected static function validateStatus(Request $request)
    {
        return $request->validate(
            [
                'level'=>'required|max:255'
            ]
            );
    }
    public function associateStatus($status, $data)
    {
        $status->duty()->associate($data);
        $status->save();
    }
}
