<?php

namespace App\Models;

use App\Models\Donor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $table = 'transaction_history';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'transaction_date',
        'mode_of_transaction',
        'amount_received',
        'receipt_acknowledgement',
        'fund_type',
        'donor_id'
    ];

    // If necessary, define any relationships here (e.g., with the Donor model)
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
