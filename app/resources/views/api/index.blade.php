@extends('layouts.api')

@section('title')
Task 1
@endsection

@section('content')
<h5>Response</h5>
<div class="z-depth-1" style="padding: 20px 20px 20px 20px;">
	<h6>Response Type: <span style="font-weight: bold;">JSON</span></h6>
	<div class="divider"></div>
	<br />
	{!! $array !!}
</div>
@endsection