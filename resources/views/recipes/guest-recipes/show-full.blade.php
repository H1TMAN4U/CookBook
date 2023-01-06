<x-app-layout>
    {{-- <div class="container mx-auto px-4 flex justify-center p-4 ">
        @foreach ($data as $value)
        <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow-md">
            <div>
                <img class="rounded-t-lg" src="{{ asset('images/' . $value->img) }}" alt="" />
            </div>
            <div class="p-5 break-words">
                <div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$value->name}}</h5>
                </div>
                <div>
                    <div>
                        <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$value->description}}</p>
                    <div>
                        <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$value->instructions}}</p>
                    </div>
                </div>
                    <p class="px-2">{{ $value->getCategory->name }}</p>
            </div>
        </div>
        @endforeach
    </div> --}}
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8  justify-center flex">
        <div class="max-w-sm w-full lg:max-w-full lg:flex" >
        @foreach ($data as $value)
            <div class="h-96 lg:h-auto lg:w-96 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{ asset('images/' . $value->img) }}');"></div>
            <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8 ">
                    <h1 class="text-gray-900 font-bold text-xl mb-2">{{$value->name}}</h1>
                    <p class="text-gray-700 text-base">{{$value->description}}</p><br>

                    <p class="text-gray-700 text-base">{{$value->instructions}}</p>
                </div>
                <div class="flex items-center">
                    <div class="">
                        @foreach ($category as $value)
                        @endforeach
                        {{-- <h3></h3><b class="text-gray-900 leading-none">Category: {{ $value->getCategory->name }}</b> --}}
                    </div>
                </div>
                <div>
                    <b>Ingredients</b>
                    @foreach($RecipeData->Ingredient as $Ingredient)
                    <div class="flex flex-col py-1 ">
                        <div class="rounded-lg border-4 border-gray-500/50">
                            <b class="px-1">{{ $Ingredient->name }}</b>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-end">
                    <p class="text-gray-600">{{$value->created_at}}</p>
                </div>
            </div>

        @endforeach
    </div>    
</div>

  </x-app-layout>
  @extends('layouts/footer')
  