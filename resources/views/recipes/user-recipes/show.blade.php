<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 my-8 sm:px-6 lg:px-8  justify-center flex">
        <div class="max-w-sm w-full lg:max-w-full lg:flex" >
            @foreach ($recipe as $value)
            <div class="h-96 lg:h-auto lg:w-96 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
             style="background-image: url('{{ asset('images/' . $value->img) }}');"></div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b 
                lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal" style="width: 100%">
                    <div class="mb-8 ">
                        <h1 class="text-gray-900 font-bold text-xl mb-2">{{$value->name}}</h1>
                        <div class="break-all">
                            <p class="text-gray-700 text-base p-1">{{$value->description}}</p>
                            <p class="text-gray-700 text-base p-1">{{$value->instructions}}</p>
                        </div>
                    </div>
                    <div>
                        <b>Ingredients</b>
                        @foreach($RecipeData->ingredient as $value)
                        <div class="flex flex-col py-1 ">
                            <div class="rounded-lg border-4 border-gray-500/50">
                                <b class="px-1">{{ $value->name }}</b>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between">
                        <div class="">
                            @foreach ($category as $value)
                            @endforeach
                            <b class="text-gray-900 leading-none">Category: {{ $value->getCategory->name }}</b>
                        </div>
                        <div>
                            <p class="text-gray-600">{{$value->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
</x-app-layout>
@extends('layouts/footer')
  