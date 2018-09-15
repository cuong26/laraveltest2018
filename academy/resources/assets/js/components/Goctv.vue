
<template>
    <div>
        <div class="page-title parallax parallax4"> 
            <div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Góc Tư Vấn</h2>
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
        <section class="main-content blog-posts blog-grid have-sidebar">
            <div class="container">
                <div class="blog-title">
                    <h1 class="bold">Góc Tư Vấn</h1>
                </div>

                <div class="post-content">
                    
                    <div class="post-wrap clearfix">
                        <article class="post flat-hover-zoom"  v-for='data in datas ' >
                            <div class="featured-post" >
                                <div class="entry-image">
                                  <a v-bind:href=" '/goc-tu-van/'+data.alias+'' "><img v-bind:src="data.image" alt="image"></a>  
                                </div>
                            </div>

                            <div class="date-post">
                                <span class="numb"> {{ data.date }} </span>
                                <span> {{ data.month }} </span>
                            </div>

                            <div class="content-post">
                                <h2 class="title-post">
                                    <a v-bind:href=" '/goc-tu-van/'+data.alias+'' ">  {{data.title}}  </a>
                                </h2>

                                <div class="entry-content">
                                    <p> {{data.description}}   </p>
                                </div>

                                <div class="entry-meta style1">
                                    <p>Posted in:<span><a href="#"> {{ data.category }}  </a></span></p>
                                    <p>Tags:<span><a href="#"> {{ data.tag }} </a></span> </p>
                                </div>
                            </div><!--  /content-post -->
                        </article><!-- /post -->

                    </div><!-- /post-wrap -->
                        
                    <div class="blog-pagination">
                        <ul class="flat-pagination">
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>                                
                            <li class="next">
                                <a href="#">Next</a>
                            </li>                               
                        </ul><!-- /.flat-pagination -->
                    </div>
                </div>

                <div id="app">
                    <sidebarn></sidebarn>
                
                </div>
            </div><!-- /container -->
        </section>  
         
    </div>

</template>
<script>
    export default{
        data(){
            return {
                datas:[]
            }
        },
        created:function(){
        //this.danhsach_user();
            this.axios.get('/api/news/list-filter?alias=goc-tu-van').then((response)=>{
                 this.datas=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
        },      
    }

</script>
