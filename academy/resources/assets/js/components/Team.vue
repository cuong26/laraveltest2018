<template>
    <div>
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
                
                  
                <div class="row teacher">

                    <div class="flat-teacher-team-isotope button-right">
                            
                        <div class="flat-teacher col-md-3 col-sm-6 flat-hover-zoom" :class="data.name.charAt(0).toLowerCase()" v-for='data in datas'>
                            <div class="entry-image">
                                <img v-bind:src=" data.image "/>
                            </div>
                            <div class="content">                               
                                <h4 class="name"> {{data.name}} </h4>
                                <ul class="flat-socials">
                                    <li class="facebook">
                                        <a v-bind:href="''+data.facebook+''"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a v-bind:href="''+data.twitter+''"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="linkedin">
                                        <a v-bind:href="''+data.linkedin+''"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a v-bind:href="''+data.youtube+''"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                                <ul class="flat-information">
                                    <li class="position">
                                        <a href="#" title="position">  {{ data.position }} </a>
                                    </li>
                                    <li class="phone">
                                        <a href="+61383766284" title="Phone number"> {{ data.phone  }}</a>
                                    </li>
                                    <li class="email">
                                        <a href="mailto:AlitStudios@gmail.com" title="Email address"> {{ data.email  }}  </a>
                                    </li>
                                </ul>

                            </div>
                        </div>                    
                    </div><!-- /.flat-teacher-team -->
                </div><!-- / .row -->
            </div><!-- / .container -->
        </section>
    </div>        
</template>
<script>
    import imagesloaded from './javascripts/imagesloaded.min.js';
    import owl from './javascripts/owl.carousel.js';
    import jquery_countTo from './javascripts/jquery-countTo.js'
    import switcher from './javascripts/switcher.js'    
    export default{
        data(){
            return {
                            
                datas:[]
            }
        },
        created:function(){
            //this.danhsach_user();
            this.axios.get('/api/teacher/list').then((response)=>{
                this.datas=response.data.data;
                // console.log('aaaaaaaaaa', response.data.data)
            });
        },          
    }

</script> 
