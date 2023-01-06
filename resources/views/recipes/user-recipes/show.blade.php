@extends('recipes.user-recipes/master')

@section('content')

{{-- <div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>recipe Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('recipes.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Name</b></label>
			<div class="col-sm-10">
				{{ $recipe->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>description</b></label>
			<div class="col-sm-10">
				{{ $recipe->description }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>instructions</b></label>
			<div class="col-sm-10">
				{{ $recipe->instructions }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b> Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $recipe->img) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div> --}}
    <div class="container mx-auto px-4 flex justify-center p-4 ">
        <div class="max-w-lg-2x rounded-lg overflow-hidden shadow-lg bg-white ">
            <img class="" style="width:650px;" src="{{ asset('images/' . $recipe->img) }}">
            <div class="h-auto">
                <div class="px-6 py-4" style="height: 50vh;">
                    <div class="flex justify-center align-center font-bold text-xl mb-2">{{$recipe->name}}</div>
                        <p class="text-gray-700 text-base break-all">
                            {{$recipe->description}}
                        </p>
                    </div>
                </div>
            <div class="px-6 pt-4 pb-2 h-auto">
        </div>
    </div>

    {{-- @foreach ($ingredient as $value)
        <h1 class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$value->name}}</h1>
    @endforeach --}}
@endsection('content')
