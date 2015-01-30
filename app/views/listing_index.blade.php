@extends('_master')

@section('title')
	Listings
@stop

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header">
                </h3>
            </div>
            
            @foreach($listings as $listing)
            
             <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> {{$listing['short_title']}} </h4>
                    </div>
                    <div class="panel-body">
                        <p>{{$listing['description']}}</p>
                        
                        <p>
                            @foreach($listing['categories'] as $category)
                                <span class='category'>{{{ $category->name }}}</span>
                            @endforeach
				        </p>
                    </div>
                    

                </div>
            </div>
            
          
            @endforeach
        </div>
        <!-- /.row -->

    </div>
    <hr>
@stop


 