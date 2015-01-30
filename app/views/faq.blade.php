@extends('_master')

@section('title')
	Welcome to Ovlii's List
@stop

@section('head')

@stop


@section('content')
    <br/><br/>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is this website about?</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            This is a web Application for listing advertisemts for buying/selling items
                            and/or services. Users can list an item or a service on the website and provide
                            the contact information ( Name, Email and Contact Number). 
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">What are the parts of this website?</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            The website has Home Page ( also called Index page), FAQ ( Frequently Asked Questions) page, About Page and a link for adding a new listing on the website. As this is a protected site developed for learning the 
functionality of authentication, all users intending to create a listing need to log in. There are two roles in this application. User role and Admin role. When a user role is used, it is to list an item/service for sale and they can log out.
                            They have the ability to search without logging into the website.
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">What Technologies have been used to develop this website?</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                           The website has been developed using PHP, Laravel Framework, HTML, CSS, Javascript, jQuery 
                            and bootstrap theme has been used. 
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Any intersted or special credit work involved in developing this website?</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            Yes, jQuery and bootstrap theme has been used.
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Any outside code used on the website?</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            Examples provided in the course have been used such as class examples, foobook example,
                            bootstrap examples, laravel examples. 
                            
                            Some of the packages used are fzaninotto/faker, xi/randomstring, badcow/lorem-ipsum
                            and barryvdh/laravel-debugbar
                                                        
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.panel-group -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop