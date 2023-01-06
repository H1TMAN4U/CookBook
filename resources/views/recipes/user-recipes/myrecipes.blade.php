
	@extends('recipes.user-recipes/master')

	@section('content')
<div class="overflow-x-auto relative shadow-md sm:rounded-lg break-all" style="width: 100%;">
    <table class="w-full text-sm text-left text-gray-500 bg-gray-100">

        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr class="bg-gray-100 border-b">
				<th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
					<a href="{{ route('recipes.create') }}" class="btn btn-success btn-sm float-end">Add</a>
				</th>
                <th scope="col" class="py-4 px-2 font-medium text-gray-900 whitespace-nowrap">Recipe name</th>
                {{-- <th scope="col" class="py-4 px-2 font-medium text-gray-900 whitespace-nowrap">Description</th> --}}
                <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap" style="width: 20px">Category</th>
                <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">Edit/View/Delete</th>
			</tr>
        </thead>
        @if(count($data) > 0)
		@foreach($recipe as $value)
			<tr class="bg-white border-b align-center">
				<td style="width: 180px;"><img src="{{ asset('images/' . $value->img) }}" width="150" style="max-height: 100px"></td>
				<td class="px-2 ">{{ $value->name }}</td>
				{{-- <td class="px-2 ">{{ $value->description }}</td> --}}
				<td class="px-2 text-center">{{ $value->getCategory->name }}</td>
				<td style="width: 20px">
					<form method="post" class="flex justify-center align-center" action="{{ route('recipes.destroy', $value->id) }}">
						@csrf
						@method('DELETE')
						<a class="px-1" href="{{ route('recipes.show', $value->id) }}" class="btn btn-primary btn-sm">View</a>
						<a class="px-1"  href="{{ route('recipes.edit', $value->id) }}" class="btn btn-warning btn-sm">Edit</a>
						<input class="px-1"  type="submit" class="btn btn-danger btn-sm" value="Delete" style="cursor: pointer"/>
					</form>
				</td>
			</tr>
		@endforeach
	@else
		<tr class="bg-white border-b dark:bg-gray-80">
			<td colspan="5" class="text-center">No Data Found</td>
		</tr>
	@endif
	</table>
	<div class="">
		{!! $data->links() !!}
	</div>
</div>@endsection
	