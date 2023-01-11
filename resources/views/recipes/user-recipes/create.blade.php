@extends('recipes.user-recipes/master')
@section('content')
<div class="flex flex-row">


<div class="flex justify-center items-center my-8">
    <div href="#" class="block max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-md ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Lorem, ipsum dolor sit amet consectetur adipisicing.</h5>
        <p class="font-normal text-gray-700 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Rerum ducimus natus magnam, minus et doloremque.</p>
        <form method="post" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 ">
                    <div class="flex items-center justify-between px-3 py-2 border-b">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block 
                        px-3 py-2 text-sm font-medium text-white transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="px-2 py-0.5 bg-white rounded-b-lg ">
                        <input type="text" name="name" id="name" class="bg-white-50 border-0 
                        text-gray-900 text-sm rounded-b-lg  block w-full  " placeholder="name" required>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 ">
                    <div class="flex items-center justify-between px-3 py-2 border-b">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible 
                        inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="px-2 py-2 bg-white rounded-b-lg ">
                        <textarea name="description" id="description" rows="8" class="block w-full px-0 
                        text-sm rounded-b-lg text-gray-800 bg-white border-0" placeholder="Write an article..." required></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 ">
                    <div class="flex items-center justify-between px-3 py-2 border-b">
                        <label for="instructions" class="block mb-2 text-sm font-medium text-gray-900 ">Instructions</label>
                        <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block 
                        px-3 py-2 text-sm font-medium text-white transition-opacity duration-300">
                        </div>
                    </div>
                    <div class="px-2 py-2 bg-white rounded-b-lg ">
                        <textarea name="instructions" id="instructions" rows="8" class="block w-full px-0 text-sm rounded-b-lg 
                        text-gray-800 bg-white border-0 " placeholder="Write an article..." required></textarea>
                    </div>
                </div>
            </div>
            
            <div class="relative z-0 mb-6 w-full group">
                <label for="category_id" class="sr-only">Underline select</label>
                <select id="category_id" name="category_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600  focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option disabled selected selected>Choose a category</option>
                    @foreach ($category as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-4">
                <div class="col-sm-10">
                    <input name = "img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                    id="multiple_files" type="file"  required>
                </div>
            </div>
            <div class="text-center">
                <input value="Add" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                id="multiple_files" type="submit" multiple>
            </div>
        </form>
    </div>
</div>
@endsection('content')
