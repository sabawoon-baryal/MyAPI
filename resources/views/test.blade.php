@extends('layouts.app')

@section('content')
<div id="app-3">
	<span v-if="seen">
		Now you see me
	</span>
</div>
<script type="text/javascript">
	var app3=new Var({
		el:'#app-3',
		data:{
			seen:true
		}
	})
</script>
@endsection