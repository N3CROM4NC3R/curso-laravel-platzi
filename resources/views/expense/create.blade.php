@extends('layouts.app')
@section('title','Expense create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>New expenses</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <form action="/expense_reports/{{ $report->id }}/expenses" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="description">Description:</label>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="form-control" type="text" id="description" name="description" placeholder="Type a description" value="{{ old('description')}}">
                    </div>
                    <div class="form-group">
                        <label for ="amount">Amount:</label>
                        @error('amount')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="form-control" type="number" id="amount" name="amount" placeholder="Type a amount" value="{{ old('amount') }}">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
