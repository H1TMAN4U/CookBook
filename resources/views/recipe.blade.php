<h1>(belongsToMany) relationship</h1>
<div class="container">
    <h2>Recipe name:{{ $RecipeData->id }} {{ $RecipeData->name }}</h2><hr>
    <p><b>Ingredients:</b></p>
    @foreach($RecipeData->Ingredient as $Ingredient)
	    <p>{{ $Ingredient->id }} {{ $Ingredient->name }}</p>
    @endforeach
</div>