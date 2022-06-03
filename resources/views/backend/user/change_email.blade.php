@extends('backend.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-9 m-auto">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Change Email </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="post" action="{{route("update.email")}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<h5>Email<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" value="{{$user[0]->email}}" class="form-control" required>
										@error('email')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Password <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" required>
										@error('password')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
                 
								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
								</div>
							</form>

						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>




		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div>




@endsection
