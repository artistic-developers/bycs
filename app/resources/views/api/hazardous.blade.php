@extends('layouts.api')

@section('title')
Task 2
@endsection

@section('content')
<h5>Response</h5>
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
		@forelse($neos as $h)
		{{ $h }}
		<br/>
		@empty
		<p>There are no hazardous asteriods recorded.</p>
		@endforelse
	</div>
	<div id="html">
		<h6>Response Type: <span style="font-weight: bold;">HTML</span></h6>
		<div class="divider"></div>
		<br />
		<div class="row">
			
			@forelse($neos as $h)
			<div class="col s12 m4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">{{$h->name}}</span>
						<p>Reference: {{$h->reference}}</p>
						<p>Speed: {{$h->speed}} kpm </p>
						<p>Is Hazardous: YES</p>
					</div>
				</div>
				<br/>
			</div>
			@empty
			<p>There are no hazardous asteriods recorded.</p>
			@endforelse
		</div>
	</div>
	
</div>
@endsection