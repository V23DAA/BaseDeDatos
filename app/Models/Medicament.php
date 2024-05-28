<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $table = "medicaments";
    protected $fillable = ['name','amount','sale','purchase','expiration_date','batch','status','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','status','registerby'];
}
