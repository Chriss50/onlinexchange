@extends('layouts.app')

@section('content')
           <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="">
                        <h3>Transactions</h3>
                    </div>
                    <div class="">
                        <a href="{{route('transactions')}}" class="btn btn-primary">NEW TRANSACTION</a>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Value</th>
                                <th>Currency</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction -> id}}</td>
                                <td>{{ Auth::user()->id ===$transaction->sender_id ? "You" : ($transaction->sender_id ? \App\Models\User::where(['id' => $transaction->sender_id])->first()->name : "");}}</td>
                                <td>{{Auth::user()->id ===$transaction->receiver_id ? "You" : \App\Models\User::where(['id' => $transaction->receiver_id])->first()->name;}}</td>
                                <td>{{$transaction -> value}}</td>
                                <td>{{\App\Models\Currency::where(['id' => $transaction->currency_id])->first()->name;}}</td>
                                <td>{{$transaction -> created_at}}</td>
                                <td>{{$transaction -> updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
