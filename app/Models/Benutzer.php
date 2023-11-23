<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benutzer extends Model
{
    use HasFactory;
    //table name in database, default will be "benutzers"
    protected $table = "benutzer";
}
