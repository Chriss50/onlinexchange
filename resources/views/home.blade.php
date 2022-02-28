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
                                <td>{{$transaction -> sender_id}}</td>
                                <td>{{$transaction -> receiver_id}}</td>
                                <td>{{$transaction -> value}}</td>
                                <td>{{$transaction -> currency_id}}</td>
                                <td>{{$transaction -> created_at}}</td>
                                <td>{{$transaction -> updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
