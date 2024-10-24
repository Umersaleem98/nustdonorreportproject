<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;

class DashboardTransactionHistoryController extends Controller
{
    public function index(Request $request)
{
    $perPage = 10; // Number of records per page
    $query = TransactionHistory::query();

    // Check if there is a search request
    if ($request->has('search') && $request->search != '') {
        $query->where('fund_type', 'LIKE', '%' . $request->search . '%');
    }

    // Paginate the results
    $transection_history = $query->paginate($perPage);

    return view('dashboard.annua_zakat_transaction_history.index', compact('transection_history'));
}


public function add_trasnaction_report_form()
{
    return view('dashboard.annua_zakat_transaction_history.addtransection');
}


public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'transaction_date' => 'required|date',
        'mode_of_transaction' => 'required|string|max:255',
        'amount_received' => 'required|numeric|min:0',
        'receipt_acknowledgement' => 'required|string',
        'fund_type' => 'required|string',
        'donor_id' => 'required|string|max:255',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create a new transaction
    $transaction = new TransactionHistory();
    $transaction->transaction_date = $request->transaction_date;
    $transaction->mode_of_transaction = $request->mode_of_transaction;
    $transaction->amount_received = $request->amount_received;
    $transaction->receipt_acknowledgement = $request->receipt_acknowledgement;
    $transaction->fund_type = $request->fund_type;
    $transaction->donor_id = $request->donor_id;

    // Save the transaction to the database
    $transaction->save();

    // Redirect back with a success message
    return view('dashboard.annua_zakat_transaction_history.addtransection') // Change to your route name
                     ->with('success', 'Transaction added successfully!');
}
}
