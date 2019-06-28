<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table= 'account';

    protected $fillable = [
        'id_account', 'comments', 'attorney_id_attorney', 'client_id_client', 'type_account_id_type_account',
    ];

    protected $primaryKey = 'id_account';

}
