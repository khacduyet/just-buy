@extends('layout.client.index')
@section('title','Account')
@section('content')
	<main>
		<section class="main_content_area">
            <div class="container">
                <div class="account_dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button">
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li class="__web-inspector-hide-shortcut__"> <a href="#orders" data-toggle="tab" class="nav-link active show">Lịch sử đơn hàng</a></li>
                                    <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                                    <li><a href="{{route('log-out')}}" class="nav-link">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade active show" id="orders">
                                    <h3>Order history</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            	@foreach($orders as $k => $ord)
                                                <tr>
                                                    <td>{{$k+1}}</td>
                                                    <td>{{$ord -> created_at}}</td>
                                                    <td>
														@if($ord -> status == 0)
									                    <span class="success">Wait for confirmation</span>
									                    @elseif($ord -> status == 1)
									                    <span class="success">Confirmed</span>
									                    @elseif($ord -> status == 2)
									                    <span class="success">Successful delivery</span>
									                    @endif
                                                    </td>
                                                    <td>{{number_format($ord->total_amount)}} VNĐ for  {{$ord -> total_quantity}} items </td>
                                                    <td><a href="{{route('detail-order',['id'=>$ord->id])}}" class="view">Order details</a></td>
                                                </tr>
            									@endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details">
                                    <h3>Account details</h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <div>
                                                            {{Auth::guard('customer')->user()->name}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <div>
                                                            {{Auth::guard('customer')->user()->email}}
                                                        </div>
                                                    </div>
                                                    <div class="place-reset-pass">
                                                       <a href="{{route('info-account',Auth::guard('customer')->user()->id) }}">Change Password</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop()

