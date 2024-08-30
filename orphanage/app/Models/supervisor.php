<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    use HasFactory;
    protected $table="supervisors";
    protected $primaryKey="S_id";
    protected $fillable=['S_id','S_name','phoneNumber'];
    public $timestamps=false;

    public function supervises()
    {
        return  $this->belongsToMany(child::class,'supervises','sSuper_id','schild_id','S_id','C_id');

    }
}

