@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Account Balance</h3><hr>
        <table class="table form-control">
            <thead>
                <th>Account</th>
                <th>Balance</th>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                <tr>
                    <td>{{$account->name}}</td>
                    <td>{{$account->balance}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
