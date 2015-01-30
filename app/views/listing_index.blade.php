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
                        <p><b>Description :</b> {{$listing['description']}}</p>
                        
                        <p><b>Contact Name : </b>{{$listing['full_name']}}</p>

                        <p><b>Contact Email :</b> {{$listing['email_address']}}</p>

                        <p><b>Contact Phone :</b> {{$listing['phone_number']}}</p>
                        
                        <p><b>Price : </b>{{$listing['price']}}</p>
                        <p> <b>Categories: </b>
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


 