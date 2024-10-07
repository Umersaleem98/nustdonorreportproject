<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donors';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'donor_name',
        'fund_name',
        'donor_email',
        'year_of_establishment',
        'amount_received',
        'number_of_beneficiaries',
    ];

    // You can also define relationships if necessary, for example:
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
