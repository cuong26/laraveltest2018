@extends('frontend.layout.masterlayout')

@section('style')
    <style>
        .widget .popular-news li .thumb img {
            max-width: 100px;
        }
        .post-wrap .featured-post {
            width: 370px;
            height: 240px;
        }
        .flat-hover-zoom .entry-image {
            max-height: 100%;
            width: auto;
        }
        .post-wrap .post .content-post {
            height: 250px;
        }
        .widget .teacher-news li .thumb {
            max-height: 100px;
        }
        .widget-teacher ul li .thumb img {
            max-height: 100px;
            width: 100px;
        }
    </style>
@endsection

@section('content')
<div class="page-title parallax parallax4"> 
            <div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Blog with sidebar</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Courses Grid</li>
                            </ul>                   
                        </div><!-- /.breadcrumbs --> 
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title parallax -->
        <div id="app"></div>
@endsection               
        <!-- Javascript -->
@section('script')
<script type="text/javascript" src="javascripts/switcher.js"></script>
<script type="text/javascript" src="javascripts/main.js"></script>
@endsection