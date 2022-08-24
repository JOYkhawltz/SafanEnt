<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['sector_id','company_name', 'owner', 'designation', 'GST', 'number_of_units', 
    'address','NTN', 'email_id','mobile','PTCL', 'ext'];
    
    
}
