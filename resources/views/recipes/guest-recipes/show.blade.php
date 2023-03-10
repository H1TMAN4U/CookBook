<x-app-layout>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-8 break-all " style="width: 100%;">
		@if(count($data) > 0)
		@foreach ($data as $value)
			<div class="flex flex-col my-2" style="width: 100%">
				<a href="show-full/{{$value->id}}" class="flex flex-col items-center bg-gray-100 border rounded-lg
				shadow-md md:flex-row md:max-full overflow-hidden hover:bg-white"  style="height:180px; ">
				<img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
				style="min-height: 182px;"  src="{{ asset('images/' . $value->img) }}" width="128" alt="">
				<div>
					<div class="flex flex-col justify-between p-4 leading-normal ">
						<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$value['name']}}</h5>
						<p class="mb-3 font-normal text-gray-700">{{$value['description']}}</p>
						
						<p class="">{{ $value->getCategory->name }}</p>
					</div>
				</div>
				</a>
			</div>
		@endforeach
		@else
		<tr class="bg-white border-b">
			<td colspan="5" class="text-center">No Data Found</td>
		</tr>
		@endif
		<div class="m-auto">
			{!! $data->links() !!}
		</div>
	</div>	
</x-app-layout>
@extends('layouts/footer')