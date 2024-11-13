<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Ensure the model refers to the correct table 'admin'
    protected $primaryKey = 'custom_id'; // Set 'custom_id' as the primary key
    public $incrementing = true; // Enable auto-incrementing
    protected $keyType = 'int'; // Define the primary key type as integer

    // Define fillable fields for mass assignment
    protected $fillable = ['title', 'content'];
}
