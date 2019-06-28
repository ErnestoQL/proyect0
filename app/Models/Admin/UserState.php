<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    protected $table= 'user_state';

    protected $fillable = [
        'id_user_state', 'state_description'
    ];
    protected $primaryKey = 'id_user_state';

    public $timestamps = false;
}
