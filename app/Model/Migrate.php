<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Migrate extends Model
{
    protected $connection = "migration";

    protected $table = "users";
}
