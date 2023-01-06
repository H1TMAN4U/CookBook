
@extends('recipes.user-recipes/master')

@section('content')

<div class="card">
	<div class="card-header">Edit recipes</div>
	<div class="card-body">
		<form method="post" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $recipe->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">description</label>
				<div class="col-sm-10">
					<input type="text" name="description" class="form-control" value="{{ $recipe->description }}" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">instructions</label>
				<div class="col-sm-10">
					<input type="text" name="instructions" class="form-control" value="{{ $recipe->instructions }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">category</label>
				<div class="col-sm-10">
					<select name="category" class="form-control">
						<option value="food">food</option>
						<option value="drink">drink</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">recipes Image</label>
				<div class="col-sm-10">
					<input type="file" name="img" />
					<br />
					<img src="{{ asset('images/' . $recipe->img) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_img" value="{{ $recipe->img }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $recipe->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('recipes_gender')[0].value = "{{ $recipe->recipes_gender }}";
</script>

@endsection('content')
