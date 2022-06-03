@extends('backend.admin_master')
@section('admin')

@php
	$date = Carbon\Carbon::now()->format('d F Y');
	$today = App\Models\Order::where('order_date',$date)->sum('total_price');

	$month = date('F');
	$month_sale = App\Models\Order::where('order_month',$month)->sum('total_price');

    $year = date('Y');
	$year_sale = App\Models\Order::where('order_year',$year)->sum('total_price');

  /*  $pending = App\Models\Order::where('status','pending')->get();

	//offline sales

	$today_offline_sale = App\Models\Offlineorder::where("order_date",$date)->sum('total_price');
	$month_offline_sale = App\Models\Offlineorder::where("order_month",$month)->sum('total_price');
	$year_offline_sale = App\Models\Offlineorder::where("order_year",$year)->sum('total_price');

	*/

@endphp 
<div class="container-full">

		<!-- Main content -->
		<section class="content">
				
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
		<div class="icon bg-primary-light rounded w-60 h-60">
			<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
			<h3 class="text-white mb-0 font-weight-500"> INR {{$today}} <small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-warning-light rounded w-60 h-60">
			<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">INR {{$month_sale}} <small class="text-success"><i class="fa fa-caret-up"></i> </small></h3>
		</div>
	</div>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<div class="box-body">							
		<div class="icon bg-info-light rounded w-60 h-60">
			<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale </p>
			<h3 class="text-white mb-0 font-weight-500">INR {{$year_sale}} <small class="text-danger"><i class="fa fa-caret-down"></i> </small></h3>
		</div>
	</div>
</div>
</div>
 


	
					</div>  
				</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>

@endsection
