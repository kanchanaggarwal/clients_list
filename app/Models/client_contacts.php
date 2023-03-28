<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_contacts extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','contact_id'];

}
