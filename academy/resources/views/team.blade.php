@extends('frontend.layout.masterlayout')
@section('content')
 <div class="page-title parallax parallax4"> 
	<div class="overlay"></div>            
    <div class="container">
        <div class="row">
            <div class="col-md-12">                    
                <div class="page-title-heading">
                    <h2 class="title">OUR TEACHERS</h2>
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

<section class="flat-row pad-top-96 pad-bottom-100">
    <div class="container">
    	<ul class="portfolio-filter">
            <li class="active"><a data-filter="*" href="#">ALL</a></li>
            <li class=""><a data-filter=".a" href="#">A</a></li>
            <li class=""><a data-filter=".b" href="#">B</a></li>
            <li class=""><a data-filter=".c" href="#">C</a></li>
            <li class=""><a data-filter=".d" href="#">D</a></li>
            <li class=""><a data-filter=".e" href="#">E</a></li>
            <li class=""><a data-filter=".f" href="#">F</a></li>
            <li class=""><a data-filter=".i" href="#">I</a></li>
            <li class=""><a data-filter=".j" href="#">J</a></li>
            <li class=""><a data-filter=".k" href="#">K</a></li>
            <li class=""><a data-filter=".l" href="#">L</a></li>
            <li class=""><a data-filter=".m" href="#">M</a></li>
            <li class=""><a data-filter=".n" href="#">N</a></li>
            <li class=""><a data-filter=".o" href="#">O</a></li>
            <li class=""><a data-filter=".p" href="#">P</a></li>
            <li class=""><a data-filter=".q" href="#">Q</a></li>
            <li class=""><a data-filter=".r" href="#">R</a></li>
            <li class=""><a data-filter=".s" href="#">S</a></li>
            <li class=""><a data-filter=".t" href="#">T</a></li>
            <li class=""><a data-filter=".u" href="#">U</a></li>
            <li class=""><a data-filter=".v" href="#">V</a></li>
            <li class=""><a data-filter=".w" href="#">W</a></li>
            <li class=""><a data-filter=".x" href="#">X</a></li>
            <li class=""><a data-filter=".y" href="#">Y</a></li>
            <li class=""><a data-filter=".z" href="#">Z</a></li>
        </ul>
    	
    	<div id="app"></div>
        <div class="blog-pagination">
            <ul class="flat-pagination">
                <li><span class="active">1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>                                
                <li class="next">
                    <a href="#">Next</a>
                </li>                               
            </ul><!-- /.flat-pagination -->
        </div>
    </div><!-- / .container -->
</section>
@endsection
@section('script')
<script type="text/javascript" src="javascript/imagesloaded.min.js"></script>
<script type="text/javascript" src="javascript/jquery.isotope.min.js"></script>
<script type="text/javascript" src="javascript/owl.carousel.js"></script> 
<script type="text/javascript" src="javascript/jquery-countTo.js"></script>    
<script type="text/javascript" src="javascript/switcher.js"></script>
<script type="text/javascript" src="javascript/main.js"></script> 
@endsection

      
