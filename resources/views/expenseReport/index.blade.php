@extends('layouts.app')
@section('title','Expense Reports')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Reports</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a id="createButton" href="/expense_reports/create" class="btn btn-primary text-center">Create a new report</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    @foreach($expenseReports as $expenseReport)
                        <tr data-reportId="{{$expenseReport->id}}">
                            <td><a href="/expense_reports/{{ $expenseReport->id }}">{{$expenseReport->title}}</a></td>
                            <td><a data-reportId="{{$expenseReport->id}}" class="btn btn-primary edit-btn" href="/expense_reports/{{ $expenseReport->id }}/edit">Edit</a></td>
                            <td><a data-reportId="{{$expenseReport->id}}" class="btn btn-primary delete-btn" href="/expense_reports/{{ $expenseReport->id }}/confirmDelete">Delete</a></td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/sweetalert2.all.min.js') }}" rel="application/javascript"></script>
    <script src="{{ URL::asset('js/index.js')}}" rel="application/javascript"></script>
@endsection
