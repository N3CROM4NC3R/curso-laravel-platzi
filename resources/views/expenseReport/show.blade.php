@extends('layouts.app')
@section('title','Edit report {{$report->id}}')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Report: {{$report->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports/{{$report->id}}/confirmSendMail" class="btn btn-primary">Send report</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Details</h3>
                <table class="table">
                    @foreach($report->expenses as $expense)
                        <tr>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>{{ $expense->amount }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/expense_reports/{{$report->id}}/expenses/create">New expense</a>
            </div>
        </div>
    </div>

@endsection
