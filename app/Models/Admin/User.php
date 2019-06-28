<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table= 'user';

    protected $fillable = [
        'id_user', 'user_description', 'user_password', 'account_id_account', 'user_state_id_user_state',
    ];

    protected $primaryKey = 'id_user';

}
