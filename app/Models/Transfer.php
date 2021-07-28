<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = 'transfers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id_from',
        'account_id_to',
        'purpose',
        'status',
        'amount',
        'date',
    ];


    public function user(){ 
        return $this->belongsTo(User::class);
    }
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function job(){
        return $this->hasMany(Job::class);
    }
}
