
<h1>(belongsToMany) relationship</h1>
<div class="container">
    <h2> Ingredient Name: {{ $IngredientData->name }}</h2><hr>
    <p><b>Recipe:</b></p>
    @foreach($IngredientData->Recipe as $Recipe)
	    <p>{{ $Recipe->name }}</p>
    @endforeach
</div>