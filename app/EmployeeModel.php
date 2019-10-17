<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $fillable = [
        'name', 'email', 'username','password','departmentname','designation','cover',
    ];
}
