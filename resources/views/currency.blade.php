@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Create Currency</h3><hr>
            <form class="form-control" action="{{route('currency.store')}}" method="post">
                <div class="form-group">
                    <label for="currency">Currency name</label>
                    <input class="form-control" type="text" name="currency" id="currency">
                </div>
                <div class="form-group">
                    <label for="rate">Exchange rate</label>
                    <input class="form-control" type="text" name="rate" id="rate">
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
                @csrf
            </form>
            <hr>
            <table class="table form-control">
                <thead>
                    <tr>
                        <th>Currency</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currencies as $currency)
                    <tr>
                        <td>{{$currency -> name}}</td>
                        <td>{{$currency -> rate}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop