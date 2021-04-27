

<h2>Hello {{$name}}</h2>
<p>Your order # {{$orders -> id_ord}} has been successfully placed at {{$orders -> created_at}} to the address {{$orders -> address}}</p>
<p><b>Total:</b> {{number_format($orders -> total_amount)}}</p>
<p><b>Transport fee:</b> 0</p>
<p><b>Total payment:</b> {{number_format($orders -> total_amount)}}</p>
<hr>
<h2>Information order</h2>
<table border="1" cellpadding="5" width="500">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		@foreach($order_detail as $k => $ord)
	    <tr>
	      <td>{{$k + 1}}</td>
	      <td>{{$ord ->getPro-> name}}</td>
	      <td>{{$ord->quantity}}</td>
	      <td>{{number_format($ord->price)}} vnđ</td>
	    </tr>
	    @endforeach
	</tbody>
</table>

