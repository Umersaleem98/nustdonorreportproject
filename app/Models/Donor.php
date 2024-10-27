<?php

namespace App\Models;

use App\Models\TransactionHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donors';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'donor_name',
        'fund_name',
        'donor_email',
        'password',
        'year_of_establishment',
        'amount_received',
        'number_of_beneficiaries',
        'donor_report_file',
    ];


    public function transactions()
    {
        return $this->hasMany(TransactionHistory::class);
    }
    // You can also define relationships if necessary, for example:
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
