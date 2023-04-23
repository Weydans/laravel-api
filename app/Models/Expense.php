<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Expense extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['user_id', 'description', 'date', 'value'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
