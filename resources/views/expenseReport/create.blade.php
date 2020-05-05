@extends('layouts.app')
@section('title','New report')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>New report</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/expense_reports" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <form action="/expense_reports" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title:</label>
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="form-control" type="text" id="title" name="title" placeholder="Type a title" value="{{ old('title')}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
