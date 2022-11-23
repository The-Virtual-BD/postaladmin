<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'account_type', 'company_name', 'tin_number', 'country', 'island', 'address', 'house', 'region', 'location', 'phone', 'nib',];
}