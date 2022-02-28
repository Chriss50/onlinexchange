@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h3>New Transaction</h3><hr>
        <form class="form-control" action="{{route('transactions.store')}}" method="post">
            <div class="form-group">
                <label for="receiver">Receiver</label>
                <select class="form-control" name="receiver" id="receiver">
                    @foreach($users as $user)
                    <option value="{{$user -> id}}">{{$user -> name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_money">Source</label>
                <select class="form-control" name="source_money" id="source_money">
                    @foreach($currencies as $currency)
                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="target_money">Target</label>
                <select class="form-control" name="target_money" id="target_money">
                    @foreach($currencies as $currency)
                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input class="form-control" type="text" name="amount" id="amount">
            </div>
            <button class="btn btn-primary" type="submit">Send</button>
            @csrf
        </form>
    </div>
</div>
@stop