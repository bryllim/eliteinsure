@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <h2>Email Function</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
                <form method="POST" action="{{ route('sendemail') }}">
                 @csrf
                <div class="form-group">
                    <label>Client Email</label>
                    <input type="text" class="form-control" name="emailaddress" required>
                </div>
                <div class="form-group">
                    <label>Email body</label>
                    <input type="text" class="form-control" name="emailbody" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
