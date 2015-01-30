<section>

	<h2>{{ $listing['title'] }}</h2>

	<p>
	{{ $listing['location']->name }} 
	</p>

	<p>
		@foreach($listing['categories'] as $category)
			{{ $category->name }}
		@endforeach
	</p>

	<br>
	<a href='/listing/edit/{{ $listing->id }}'>Edit</a>
</section>