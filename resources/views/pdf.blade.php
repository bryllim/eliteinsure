<!DOCTYPE html>
<html>
<head>
<style>
body {
    font: normal 10px Verdana, Arial, sans-serif;
}
p{
    font-size: 15px;
}
table, th, td{
    border:1px solid black;
    text-align:center;
}
table{
    border-collapse: collapse;
    width: 100%;
    font-size: 15px;
}
th{
    background:lightgrey;
}
</style>
</head>
<body>

<img src="images/onlineinsurance_logo.png" style="height:auto; width: 60%; margin-left:20%">
<h1 style="color:blue; text-align:center"><strong>Buyer Created Tax Invoice</strong></h1>

<div style="background-color:lightgray; padding:3px">
    <h1 style="margin-left:10px">Salesrep No.: {{$data->salesrep_id}}
        <span style="float:right; margin-right:10px">
            @if($data->period == "1-15")
                01/{{$data->month}}/{{$data->year}} - 15/{{$data->month}}/{{$data->year}}
            @else
                15/{{$data->month}}/{{$data->year}} - 30/{{$data->month}}/{{$data->year}}
            @endif
        </span>
    </h1>
</div>
<br>
<p><strong><u>Produced on:</u></strong> {{date('d/m/Y')}} | Sumit Monga, 1C/39 Mackelvie Street Grey Lynn, 1021, Auckland</p>
<p><strong><u>Produced by:</u></strong> OnlineInsurance Limited, 1C/39 Mackelvie Street Grey Lynn 1021, Auckland, New Zealand</p>
<br>
<br>
<p><strong>Buyer Created Tax Invoice</strong></p>
<table>
<thead>
    <tr>
        <th>Date</th>
        <th>Description</th>
        <th>Debit</th>
        <th>Credit</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{date('d/m/Y')}}</td>
        <td>Commissions</td>
        <td></td>
        <td>${{$netcommission}}</td>
    </tr>
    <tr>
        <td>{{date('d/m/Y')}}</td>
        <td>Bonuses</td>
        <td></td>
        <td>${{$data->bonuses}}</td>
    </tr>
</tbody>
</table>
<div style="text-align:right">
    <p><strong>Net: ${{$netcommission + $data->bonuses}}</strong></p>
    <p><strong>Commission: ${{$commission}}</strong></p>
    <p><strong>Tax: ${{$tax}}</strong></p>
    <p><strong>Payment Amount: <span style="color:red">${{$paymentamount}}</span></strong></p>
</div>

<h1 style="color:blue; text-align:center; page-break-before: always;"><strong>Detail Commission Statement</strong></h1>

<div style="background-color:lightgray; padding:3px">
    <h1 style="margin-left:10px">Salesrep No.: {{$data->salesrep_id}} Production</h1>
</div>
<br><br>
<table>
<thead>
    <tr>
        <th>Client Name</th>
        <th>Commission</th>
    </tr>
</thead>
<tbody>
    @foreach($clients as $client)
    <tr>
        <td>{{$client->name}}</td>
        <td>${{$client->commission}}</td>
    </tr>
    @endforeach
    <tr>
        <td><strong style="text-align:right">Total:</strong></td>
        <td><strong>${{$netcommission}}</strong></td>
    </tr>
</tbody>
</table>
</body>
</html>
