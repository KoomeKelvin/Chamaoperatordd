<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Priority;
use App\Models\Team;
use App\Models\Duty;
use App\Models\Comment;
use App\Models\Status;


class Duty extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
    

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->morphMany(Duty::class, 'reviewable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }



    /**
     * Custom actions to refactor code on DutyController
     */
    public static function validateDutyDetails(Request $request)
    {
        return $request->validate(
         [
            'name'=>'required|max:255',
            'description'=>'required',
            'deadline'=>'required'
        ]
         );
    }
    public static function associateDuty($data, $duty)
    {
        $duty->user()->associate($data);
        $duty->priority()->associate($data);
        $duty->team()->associate($data);
        $duty->save();
    }


}
