<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oparent extends Model
{
    use HasFactory;
    protected $table="parents";
    protected $primaryKey="P_id";
    protected $fillable=['P_id','P_name','phoneNumber','user_id'];
    public $timestamps=false;


    public function adoptsChildren()
    {
        return $this->belongsToMany(child::class,'adopts','aparent_id','achild_id','P_id','C_id')->withPivot('adoptionDate');

    }

    public function visitsChildren()
    {
        return $this->belongsToMany(child::class,'visits','vparent_id','vchild_id','P_id','C_id')->withPivot('visitDate', 'request');

    }

    public function account()
    {
         return $this->belongsTo(user::class,'user_id');

    }
}
