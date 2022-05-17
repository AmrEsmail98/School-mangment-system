<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Sunny Admin - Recover Password</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

</head>

<body class="hold-transition theme-primary bg-gradient-primary">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h3 class="mb-0 text-white">Recover Password</h3>
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
							<form action="{{ route('password.email') }}" method="post">
                                @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
										</div>
										<input type="email" name="email" id="email" :value="old('email')" required autofocus class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Your Email">
									</div>
								</div>
								  <div class="row">
									<div class="col-12 text-center">
                                        {{ __('Email Password Reset Link') }}
                                    									</div>
									<!-- /.col -->
								  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Vendor JS -->
	<script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>

</body>
</html>
