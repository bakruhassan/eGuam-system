<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Invoice # {{$invoice->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                    {{$invoice->kes->customer['address']}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                    {{$invoice->kes->customer['address']}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Customer Info:</strong><br>
    					{{$invoice->kes->customer['name']}}<br>
    					ic: {{$invoice->kes->customer['ic']}}<br>
                        phone: {{$invoice->kes->customer['phone']}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Invoice Date:</strong><br>
    					{{$invoice->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Invoice summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Case</strong></td>
        							<td class="text-center"><strong>Case Status</strong></td>
        							<td class="text-center"><strong>Expenses</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>{{$invoice->kes['name']}}</td>
    								<td class="text-center">{{$invoice->kes['status']}}</td>
    								<td class="text-center">RM {{$invoice->kes['expenses']}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>