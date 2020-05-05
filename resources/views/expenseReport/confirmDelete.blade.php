@extends('layouts.app')
@section('title','Delete report {{$report->id}}')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Delete report {{$report->id}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="/expense_reports/{{ $report->id }}" method="post">
                    @csrf
                    @method('delete')

                    <p>¿Confirm delete?</p>
                    <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
