<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Currency;
use App\Models\Account;

class TransactionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction') -> with('users', User::all())
        -> with('currencies', Currency::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'receiver' => 'required',
            'source_money' => 'required',
            'target_money' => 'required',
            'amount' => 'required'
        ]);

        $account_info = Account::where([
            ['user_id','=',Auth::user()->id],
            ['currency_id','=',(int)$request->source_money]
        ])->first();
            // dd($account_info);
        if((int) $account_info->balance < $request->amount)
        {
            $this->addError("Balance not enough");
            return;
        }


        $receivingAccount = Account::where([
            ['user_id','=',$request->receiver],
            ['currency_id','=',$request->target_money]
        ])->first();

        $receivingAccount->balance = $receivingAccount->balance + $this->convertCurrency($request->source_money, $request->target_money, $request->amount);

        $receivingAccount->save();


        $account_info->balance = $account_info->balance - $request->amount;
        $account_info->save();

        $transaction = new Transaction();
        $transaction -> sender_id = $request -> user() -> id;
        $transaction -> receiver_id = $request -> receiver;
        $transaction -> currency_id = $request -> target_money;
        $transaction -> comment = 'Sent';
        $transaction -> value =  $this->convertCurrency($request->source_money, $request->target_money, $request->amount);

        $transaction -> save();

        return redirect() -> route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function convertCurrency($inputCurrency, $returnCurrency, $amount)
    {
        if($inputCurrency == $returnCurrency)
        {
            return $amount;
        }

        $inputRate = Currency::query()->where('id','=',$inputCurrency)->first();
        $outputRate = Currency::query()->where('id','=',$returnCurrency)->first();

        $dollarAmount =  (float) $amount/ $inputRate->rate;
        $outgoingAmount = $dollarAmount * $outputRate->rate;

        return $outgoingAmount;
    }
}
