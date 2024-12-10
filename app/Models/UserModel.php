<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Tambahkan trait HasApiTokens 

class UserModel extends Authenticatable 
{ 
    use HasApiTokens, HasFactory, Notifiable; 
    
    protected $table = 'users'; // Ensure the model refers to the correct table 'admin'
    protected $primaryKey = 'id'; // Set 'custom_id' as the primary key
    public $incrementing = true; // Enable auto-incrementing
    protected $keyType = 'int'; // Define the primary key type as integer

    protected $fillable = [ 
        'name', 
        'email', 
        'password', 
    ]; 
 
    protected $hidden = [ 
        'password', 
        'remember_token', 
    ]; 
} 
 
 
 

