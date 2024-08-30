<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table="admins";
    protected $primaryKey="A_id";
    protected $fillable=['A_id','A_name','phoneNumber','user_id'];
    public $timestamps=false;

    public function account()
    {
        return $this->belongsTo(user::class,'user_id');

    }
}
