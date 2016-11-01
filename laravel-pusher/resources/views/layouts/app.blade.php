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
				<aside class="sm-side">
					<div class="user-head">
						<a class="inbox-avatar" href="javascript:;">
							<img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
						</a>

						@if (Auth::check())
							<div class="user-name">
								<h5><a href="#">{{ Auth::user()->name }}</a></h5>
								<span><a href="#">{{ Auth::user()->email }}</a></span>

								<br>

								<span><i class="fa fa-lock"></i> <a href="{{url('logout')}}">Logout</a></span>
							</div>
						@endif

						<a class="mail-dropdown pull-right" href="javascript:;">
							<i class="fa fa-chevron-down"></i>
						</a>
					</div>
					<div class="inbox-body">
						<a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-compose">
							Compose
						</a>
						<!-- Modal -->
						<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h4 class="modal-title">Compose</h4>
									</div>
									<div class="modal-body">
										<form role="form" class="form-horizontal">
											<div class="form-group">
												<label class="col-lg-2 control-label">To</label>
												<div class="col-lg-10">
													<input type="text" placeholder="" id="inputEmail1" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-2 control-label">Cc / Bcc</label>
												<div class="col-lg-10">
													<input type="text" placeholder="" id="cc" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-2 control-label">Subject</label>
												<div class="col-lg-10">
													<input type="text" placeholder="" id="inputPassword1" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-2 control-label">Message</label>
												<div class="col-lg-10">
													<textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
												</div>
											</div>

											<div class="form-group">
												<div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>
													<button class="btn btn-send" type="submit">Send</button>
												</div>
											</div>
										</form>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div>

					<ul class="inbox-nav inbox-divider">
						<li>
							<router-link :to="{name: 'addRoom'}">
								<i class="fa fa-plus"></i> Add Room <span class="label label-danger pull-right">2</span>
							</router-link>
						</li>
						<li>
							<router-link :to="{name: 'myRooms'}">
								<i class="fa fa-user"></i> My Rooms <span class="label label-danger pull-right">2</span>
							</router-link>
						</li>
						<li>
							<router-link :to="{name: 'allRooms'}">
								<i class="fa fa-users"></i> All Rooms <span class="label label-danger pull-right">2</span>
							</router-link>
						</li>
						<li>
							<router-link :to="{name: 'chat'}">
								<i class="fa fa-users"></i> Chat <span class="label label-danger pull-right">2</span>
							</router-link>
						</li>
					</ul>
				</aside>

				<aside class="lg-side">
					<div class="inbox-head">
						<h3>Inbox</h3>
						<form action="#" class="pull-right position">
							<div class="input-append">
								<input type="text" class="sr-input" placeholder="Search Mail">
								<button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
							</div>
						</form>
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
