<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class child extends Model
{
    use HasFactory;
    protected $table="children";
    protected $primaryKey="C_id";
    protected $fillable=['C_id','C_name','arrivalDate','birthDate','image','adopted'];
    public $timestamps=false;


    public function adoptsParents()
    {
       return $this->belongsTo(oparent::class,'achild_id',);

    }

    public function visitsParents()
    {
        return $this->belongsToMany(oparent::class,'visits','vchild_id','vparent_id','C_id','P_id')->withPivot('visitDate', 'request');

    }

    public function supervises()
    {
        return  $this->belongsTo(child::class,'schild_id');
    }



}
