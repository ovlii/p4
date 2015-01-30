@extends('_master')

@section('title')
	Welcome to Ovlii's List
@stop

@section('head')

@stop

@section('header')
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            @foreach($listings as $listing)
            <div class="item active">
                <div class="carousel-caption">
                    <h2>{{$listing['short_title']}}</h2>
                    
                    <div class="panel-body">
                        <p>{{$listing['description']}}</p>
                        
                        <p>Price : <b>{{$listing['price']}}</b></p>
                    </div>
                    
                </div>
            </div>            
            
            @endforeach

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
@stop


@section('footer')