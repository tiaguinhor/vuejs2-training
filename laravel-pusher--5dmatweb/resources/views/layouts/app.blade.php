<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	{{Html::style('./css/style.css')}}

	<style>
		.username{
			color: white;
		}
		.padding{
			padding: 0 20px;
			color: white;
		}
	</style>

	<script>
		window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>

<body>
	<div class="container-fluid" id="app">
		<div class="row">
			<div class="col-lg-12 mail-box">
				<aside class="lg-side">
					<div class="inbox-head">
						<div class="col-lg-10">
							<h3>Real Time Chat</h3>

							<router-link :to="{name: 'addRoom'}" class="padding">
								<i class="fa fa-plus"></i> Add Room
							</router-link>

							<router-link :to="{name: 'myRooms'}" class="padding">
								<i class="fa fa-user"></i> My Rooms
							</router-link>

							<router-link :to="{name: 'allRooms'}" class="padding">
								<i class="fa fa-users"></i> All Rooms
							</router-link>

							@if (Auth::check())
								<div class="user-name">
									<router-link :to="{name: 'profile'}" class="username">
										<img src="{{getAvatar(Auth::user()->avatar)}}" alt="" width="20" class="img-circle"> {{ Auth::user()->name }}
									</router-link>

									<a href="javascript:" class="padding"><i class="fa fa-lock"></i> Logout</a>
								</div>
							@endif
						</div>
					</div>

					<div class="inbox-body">
						@yield('content')
					</div>
				</aside>
			</div>
		</div>
	</div>

	{{Html::script('js/app.js')}}
</body>
</html>
