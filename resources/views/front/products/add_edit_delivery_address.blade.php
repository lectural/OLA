@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Delivery Addresses</li>
    </ul>
	<h3> {{ $title }} </h3>	
    <hr class="soft"/>
    @if(Session::has('success_message'))
            <div class="alert alert-success" role="alert" style="margin-top:10px;">
            {{ Session::get('success_message') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<?php Session::forget('success_message'); ?>
     @endif
    @if(Session::has('error_message'))
        <div class="alert alert-danger" role="alert" style="margin-top:10px;">
        {{ Session::get('error_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
		<?php Session::forget('error_message'); ?>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
	
	<div class="row">
		<div class="span4">	
			<div class="well">
            Enter your delivery address details<br/><br/>
            <form id="deliveryAddressForm" action="{{ url('/add-edit-delivery-address') }}" method="post">
                @csrf
			  <div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
				  <input class="span3"  type="text" id="name" name="name" placeholder="Enter Name" required="">
				</div>
              </div>
              <div class="control-group">
				<label class="control-label" for="address">Address</label>
				<div class="controls">
				  <input class="span3"  type="text" id="address" name="address" placeholder="Enter Address" >
				</div>
              </div>
              <div class="control-group">
				<label class="control-label" for="city">City</label>
				<div class="controls">
				  <input class="span3"  type="text" id="city" name="city" placeholder="Enter City" >
				</div>
              </div> <div class="control-group">
				<label class="control-label" for="state">State</label>
				<div class="controls">
				  <input class="span3"  type="text" id="state" name="state" placeholder="Enter State" >
				</div>
			  </div> 
			  <div class="control-group">
				<label class="control-label" for="country">Country</label>
				<div class="controls">
				 <select class="span3" id="country" name="country">
                     <option value="">Select Country</option>
                     @foreach ($countries as $country)
                         <option value="{{ $country['country_name'] }}" >{{ $country['country_name'] }}</option>
                     @endforeach
                 </select>
				</div>
              </div>
              <div class="control-group">
				<label class="control-label" for="mobile">Mobile</label>
				<div class="controls">
				  <input class="span3"  type="text" id="mobile" name="mobile" placeholder="Enter Mobile" >
				</div>
              </div>
              <div class="control-group">
				<label class="control-label" for="pincode">Pincode</label>
				<div class="controls">
				  <input class="span3"  type="text" id="pincode" name="pincode" placeholder="Enter Pincode">
				</div>
              </div>
              
              
			  <div class="controls">
				<button type="submit" class="btn block">Submit</button>
				<a style="float: right;" class="btn block" href="{{ url('checkout') }}">Back</a>
			  </div>
			</form>
		</div>
		</div>
		
	</div>	
	
</div>
@endsection