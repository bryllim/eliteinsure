@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($successMsg))
    <div class="alert alert-success"> {{ $successMsg }}</div>
    @endif
    <div class="row mt-5">
        <h1>Add a new Sales Representative</h1>
    </div>
    <hr>
    <form method="POST" action="{{ route('addsalesrep') }}">
    @csrf
        <div class="form-group">
            <label>Salesrep Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Commission Percentage</label>
            <input type="number" class="form-control" name="commission" required>
        </div>
        <div class="form-group">
            <label>Tax Rate</label>
            <input type="number" class="form-control" name="tax" required>
        </div>
        <div class="form-group">
            <label>Bonuses</label>
            <input type="number" class="form-control" name="bonus" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
@endsection
