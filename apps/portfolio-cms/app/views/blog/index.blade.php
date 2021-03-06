@extends('layouts.blog')
@section('content')
@if(!empty($currentcategory))
@foreach ($currentcategory as $category)
    <h2>{{ link_to_action('BlogController@getByCat', ($category->category), $category->id) }}</h2>
@endforeach
<hr>
@endif
{{ $posts->links() }}
@foreach ($posts as $post)
<article>
	<h2>{{ link_to_action('BlogController@show', $post->title, $post->id) }}</h2>
  <h6>{{{ date("jS M Y", strtotime($post->created_at)) }}}</h6>
        <div class="row">
          <div class="large-12 columns">
            {{ first_paragraph($post->content) }}
          </div>  
          <div class="large-12 columns">
          <p>{{ link_to_action('BlogController@show', 'Leer más >', $post->id, array('class'=>'button'))}}</p>
          <p><i class="fi-comment"></i>
            {{ link_to_action('BlogController@show', $commentcount[$post->id] . '  comentarios', $post->id) }}</p>
            <ul>
          </ul>
          </div>
        </div>   
    </article>
    <hr>
@endforeach
@stop