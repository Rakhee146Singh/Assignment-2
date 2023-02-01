<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_name',
        'amount'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'accounts_user', 'account_id', 'user_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
