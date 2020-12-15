@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($successMsg))
    <div class="alert alert-success"> {{ $successMsg }}</div>
    @endif
    <div class="row mt-5">
        <h3 style="text-align:center">Create Payroll</h3>
    </div>
    <hr>
    <form method="POST" action="{{ route('newpayroll') }}">
    @csrf
        <div class="form-group">
            <label>Salesrep Name</label>
            <select class="form-control" name="salesrep" required>
                <option value="" selected disabled>Select Salesrep</option>
                @foreach ($salesreps as $salesrep)
                <option value="{{ $salesrep['id'] }}">{{$salesrep['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Date Period</label>
            <select class="form-control" name="month" required>
                <option value="" selected disabled>Select month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <br>
            <select class="form-control" name="period" required>
                <option value="" selected disabled>Select period</option>
                <option value="1-15">1-15</option>
                <option value="15-30">15-30</option>
            </select>
            <br>
            <select class="form-control" name="year" required>
                <option value="" selected disabled>Select year</option>
                @for ($year = 2020; $year > 1950; $year--)
                <option value="{{$year}}">{{$year}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label>Bonuses</label>
            <input type="number" class="form-control" name="bonus" required>
        </div>
        <div class="form-group">
            <label>Number of clients</label>
            <input id="numberOfClients" type="number" class="form-control" name="clients" onchange="clientsChanged()" required>
        </div>
        <div id="clientArea"></div>
        <button type="submit" class="btn btn-primary btn-block">Create Payroll</button>
    </form>
</div>
<script>

function clientsChanged(){
    var clientBlock = '';
    for(var i = 0; i < document.getElementById("numberOfClients").value; i++){
        clientBlock += '<div class="form-group"><label>Client Name</label><input type="text" class="form-control" name="client'+i+'" required></div>';
        clientBlock += '<div class="form-group"><label>OnlineInsure Commissions</label><input type="number" class="form-control" name="commission'+i+'" required></div>';
    }
    document.getElementById("clientArea").innerHTML = clientBlock;
}

</script>
@endsection
