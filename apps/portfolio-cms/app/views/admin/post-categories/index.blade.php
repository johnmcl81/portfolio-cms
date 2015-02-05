@extends('layouts.admin')
@section('content')
<?php
  if (isset($_GET['used']) AND $_GET['used']==1) {
    $used = 1;
    $categories = $usedcategories;
  } else {
    $used = 0;
    $categories = $unusedcategories;
  }
 ?> 

{{ link_to_route('admin.post-categories.create', 'Create New Category', null, ['class' => 'button']) }}
<h2 class="gallery-listings">Post Categories</h2><hr>

<dl class="tabs">
  @if ($used == 0)
    <dd class=active><a href="#">Unused</a></dd>
    <dd>
      {{ link_to_action('PostCategoryController@index', 'In Use', array('used' => '1')) }}
    </dd>
  @else
    <dd>
      {{ link_to_action('PostCategoryController@index', 'Unused', array('used' => '0'))  }}
    </dd>
    <dd class=active><a href="#">In Use</a></dd>
  @endif
</dl>

<div class="tabs-content">
  <div class="content active">
  @if ($categories->count())
    <table width = 100%>
    <tbody>
        @foreach($categories as $category)
            @include('admin.partials._admin-postcategories')
        @endforeach
        </tbody>
</table>
  @else
    <p>No categories found<p>
  @endif
{{ $categories->appends(array('used' => $used))->links() }}
  </div>
</div>
@stop