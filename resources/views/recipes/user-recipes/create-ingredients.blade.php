<x-app-layout>
    <div class="flex justify-center items-center my-8">
        <div href="#" class="block max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow-md ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Lorem, ipsum dolor sit amet consectetur adipisicing.</h5>
            <p class="font-normal text-gray-700 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Rerum ducimus natus magnam, minus et doloremque.</p>
            <form method="post" action="{{ route('recipe-ingredients.store') }}" enctype="multipart/form-data" class="my-2">
                @csrf
                <div class="relative z-0 mb-6 w-full group">
                    <label for="recipe_id" class="sr-only">Underline select</label>
                    <select id="recipe_id" name="recipe_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0
                    border-b-2 border-gray-300 appearance-none  dark:border-gray-600  focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option disabled selected selected>Choose a recipe</option>
                        @foreach ($recipe as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="ingredient_id" class="sr-only">Underline select</label>
                    <select id="ingredient_id" name="ingredient_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent
                    border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600  focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option disabled selected selected>Choose ingredient for recipe</option>
                        @foreach ($ingredient as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <input value="Add" class="block w-full text-sm text-gray-900 border
                    border-gray-300 rounded-lg cursor-pointer bg-gray-50 " id="multiple_files" type="submit" multiple>
                </div> 
            </form>    
        </div>
    </div>
</x-app-layout>
