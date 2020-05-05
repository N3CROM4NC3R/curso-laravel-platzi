@extends('layouts.app')
@section('title','New report')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Send report</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <form action="/expense_reports/{{$report->id}}/sendMail" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email:</label>
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="form-control" type="text" id="email" name="email" placeholder="Type a email" value="{{ old('email')}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Send mail</button>
                </form>
            </div>
        </div>
    </div>
@endsection
