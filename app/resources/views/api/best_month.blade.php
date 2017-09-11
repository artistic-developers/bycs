@extends('layouts.api')

@section('title')
Task 5
@endsection

@section('content')
<h5>Response</h5>
<h6>Hazardous Status: <span style="font-weight: bold;">@if($hz == 1) HAZARDOUS @else NON HAZARDOUS @endif</span></h6>
<form method="GET" action="/neo/best-month">
Change to: 
	<input type="text" name="hazardous" @if($hz == 1) value="false" @else value="true" @endif style="display: none;" />
	<button class="btn waves-light waves-effect" type="submit">@if($hz == 1) NON HAZARDOUS @else HAZARDOUS @endif</button>
</form>
<br />
<div class="row">
	<div class="col s12 m12">
		<ul class="tabs">
			<li class="tab col s6"><a class="active" href="#json">JSON</a></li>
			<li class="tab col s6"><a href="#html">HTML</a></li>
		</ul>
	</div>
</div>
<div class="z-depth-1" style="padding: 20px 20px 20px 20px;">
	<div id="json">
		<h6>Response Type: <span style="font-weight: bold;">JSON</span></h6>
		<div class="divider"></div>
		<br />

		{!! json_encode($neos) !!}
		<br/>

	</div>
	<div id="html">
		<h6>Response Type: <span style="font-weight: bold;">HTML</span></h6>
		<div class="divider"></div>
		<br />
		<div class="row">

			<div class="col s12 m12">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">Best Month</span>
						<p><span style="font-weight: bold;">{{$neos->month}} - {{ date("F", mktime(0, 0, 0, $neos->month, 10))}}</span></p>
						<p>Count of NEOS: {{ $neos->count }}</p>
						<p>Is Hazardous: @if($hz == 1) YES @else NO @endif</p>
					</div>
				</div>
				<br/>
			</div>

		</div>
	</div>
	
</div>
@endsection