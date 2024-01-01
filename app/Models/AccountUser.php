<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountUser extends Model
{
    use HasFactory;

    protected $table = 'accounts_user';

    protected $fillable = ['user_id', 'account_id', 'is_admin', 'status'];
}
