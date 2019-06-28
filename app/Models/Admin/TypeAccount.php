<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
    protected $table= 'type_account';


    protected $fillable = [
        'id_type_account', 'description_account'
    ];

    protected $primaryKey = 'id_type_account';

    public $timestamps = false;



}
