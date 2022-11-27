<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function client_companies()
    {
        return $this->belongsToMany(Company::class, CompanyClient::class, 'id', 'client_id');
    }
}
