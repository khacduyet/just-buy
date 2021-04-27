

<h2>Xin chào {{$name}}</h2>
<p>Đơn hàng #{{$orders -> id_ord}} của bạn đã đặt thành công vào lúc {{$orders -> created_at}} tới địa chỉ {{$orders -> address}}</p>
<p><b>Tổng tiền:</b> {{number_format($orders -> total_amount)}}</p>
<p><b>Phí vận chuyển:</b> 0</p>
<p><b>Tổng thanh toán:</b> {{number_format($orders -> total_amount)}}</p>
<hr>
<h2>Thông tin đơn hàng</h2>
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

