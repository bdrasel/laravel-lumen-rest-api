<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $table = 'phone_book_details';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
