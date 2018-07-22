@extends('layouts.app')

@section('content')
	
	@include('admin.includes.errors')

	<div class="panel panel-default">
		<div class="panel-heading">
			Create new tag
		</div>
		<div class="panel-body">
			<form action="{{route('tag.store')}}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" class="form-control input-sm"></input>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success btn-sm" type="submit">Store tag</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop