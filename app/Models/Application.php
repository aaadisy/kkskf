<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'date_of_birth',
        'gender',
        'father_spouse_name',
        'e_card_number',
        'full_address',
        'mobile_number',
        'occupation',
        'pincode',
        'cast',
        'total_family_members',
        'district',
        'block',
        'ulb',
        'block_ulb_name',
        'document_type',
        'document_number',
        'photo',
        'remark',
        'status',
        'approved',
    ];

    // Define relationships if needed, e.g., a relationship to the User model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
