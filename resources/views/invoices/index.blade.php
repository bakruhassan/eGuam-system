@extends('layouts.app')
@section('content')

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>case</th>
            <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
    @foreach ($invoices as $invoice)
        <tr>
            <td><a href="/invoices/{{$invoice->id}}" class="btn btn-primary">{{$i}}: View</a></td>
            <td><a href="/kes/{{$invoice->kes['id']}}">{{$invoice->kes['name']}}</a></td>
            <td>{{$invoice->created_at}}</td>
            <?php $i++; ?>
        </tr>
    @endforeach
</tbody>
    </table>
</div>
    <a href="/invoices/create/" class="btn btn-info">Generate an invoice</a>


@endsection