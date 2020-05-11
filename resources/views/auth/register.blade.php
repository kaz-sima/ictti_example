@extends('layouts.userlayout')
@section('content')
<div class="container">
		<div class="div-register-group">
			<div class="row">
				<div class="col-md-12">
					<h2>Register</h2>
					<p class="p-message"></p>
					<form method="POST" action="{{ route('register') }}">			
					{{ csrf_field() }}
						<div class="row">
							<div class="col-6 offset-3">
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="firstname">Full Name: </label>
											<input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
											<!-- <font color="red">{{ $errors->first('firstname') }}</font> -->
											@if ($errors->has('name'))
                                            	<font color="red">
                                            		Please Enter Full Name.
                                            	</font>
                                             @endif
										<!-- </div>																		</div> -->
								</div>
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="gender">Gender:</label>
											<input type="radio" name="gender" value='male' @if(old('gender') == 'male' ) checked @endif> Male
											<input type="radio" name="gender" value='female' @if(old('gender') == 'female' ) checked @endif> Female
											<font color="red">{{ $errors->first('gender') }}</font>
										</div>
									<!-- </div>
								</div> -->
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="nrc"><font color="green">NRC: e.g., 9/MaHtaLa(N)xxxxxx</font></label>
											<input type="text" class="form-control" id="nrc" name="nrc" value="{{old('nrc')}}">
									        <!-- <font color="red">{{ $errors->first('nrc') }}</font> -->
											@if($errors->has('nrc'))
												<font color="red">
													Please Enter NRC number.
												</font>
											@endif
										<!-- </div>
									</div> -->
								</div>
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="email">Email: <span class="asterisk">*</span></label>
											<span class="error-msg">
											</span>
											<input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
									         <!-- <font color="red">{{ $errors->first('email') }}</font> -->
											@if($errors->has('email'))
											<font color ="red">
												Please Enter the Email.
											</font>
											@endif
										<!-- </div>
									</div> -->
								</div>
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="password">Password: <span class="asterisk">*</span></label>  (4 to 30 digit)
											<span class="error-msg">
											</span>
											<input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
									        <!-- <font color="red">{{ $errors->first('password') }}</font> -->											
											@if($errors->has('password'))
											<font color="red">
												@foreach ($errors->get('password') as $message)
												{{$message}}
												@endforeach
											</font>
											@endif
										<!-- </div>
									</div> -->
								</div>
								<div class="form-group">
									<!--  <div class="row name-row">
										<div class="col-md-6"> -->
											<label for="password_confirmation">Confirm Password: <span class="asterisk">*</span></label>
											<span class="error-msg">
											</span>
											<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
											<span id='message'></span>
											<font color="red">{{ $errors->first('password_confirmation') }}</font>        									
        								<!-- </div>
        							</div> -->
								</div>
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
        									<label>Phone No: <font color="green">e.g.,xx-xxxxxxx, xxx-xxxxx</font></label>
        									<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
        									<!-- <font color="red">{{ $errors->first('phone') }}</font> -->
        									@if($errors->has('phone'))
        										<font color="red">
        											Please Enter Phone Number.
        										</font>
        									@endif
        								<!-- </div>
        							</div> -->
								</div>
								<div class="form-group">
									<!-- <div class="row name-row">
										<div class="col-md-6"> -->
        									<label for="address">Permanent Address: <span class="asterisk">*</span></label>
        									<span class="error-msg">
        									</span>
        									<input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
        									<!-- <font color="red">{{ $errors->first('address') }}</font> -->
        									@if($errors->has('address'))
        										<font color="red">
        											Please Enter Address.
        										</font>
        									@endif
        								<!-- </div>
        							</div> -->
								</div>
								<div class="form-group div-submit-button">
									<input type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit" value="Register">																	</div>
								<p class="p-member">Are you a member ?<a href="{{ url('login') }}"> Login Here!</a></p>
							</div>
						</div>
						<dev class="row">
							<div class="col-md-3 ">     						
        						<a href="{{ url('/auth/facebook')}}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
	       					</div>	       					
						</dev>						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

