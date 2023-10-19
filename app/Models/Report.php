<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // * RELATIONSHIP
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
