<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model 
{ 
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'students'; // If your table name is not the plural of the model
    
    //protected $primaryKey = 'custom_primary_key'; // If your primary key is not 'id'

    protected $fillable = ['fullname', 'address','email','password','age','prof_pic'];
    
}
