@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Account Balance</h3><hr>
        <table class="table form-control">
            <tbody>
                @foreach($currencies as $currency)
                <tr>
                    <td>{{$currency -> name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop