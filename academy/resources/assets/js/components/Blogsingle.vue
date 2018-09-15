
   
<template>
    <div>
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

        <section class="main-content blog-posts style-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-title-single">
                            <h1 class="bold"> {{dl.title }} </h1>
                            <article class="entry clearfix">
                                <div class="entry-border">
                                    <div class="main-post">
                                        <div class="wrap-img">
                                            <img v-bind:src="dl.user_image" alt="images">
                                            <h6> {{ dl.poster }} </h6>
                                            <div class="entry-meta">
                                                <span class="date"><a href="#"> {{ dl.date }} </a></span>
                                                <span class="comment"><a href="#"> {{ dl.news_comment }} </a></span>
                                                <span class="tag"><a href="#"> {{ dl.tag }} </a></span>
                                            </div>
                                        </div>  
                                        
                                        <div class="feature-post">
                                            <img v-bind:src="dl.image" alt="image">
                                        </div><!-- /.feature-post -->
                                        <div class="entry-content">
                                            <p v-html="dl.content"> 
                                            </p> 
                                           
                                        </div><!-- /.entry-post -->

                                    </div><!-- /.main-post -->
                                    <!-- Wrap-share -->
                                    <div class="wrap-share">
                                        <div class="share-post">  
                                            <h4>Share:</h4>                                 
                                          <!--   <ul class="flat-socials">
                                                <li class="twitter">
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li class="facebook">
                                                    <a id="fb-share" href="https://www.facebook.com/sharer/sharer.php?u=http://vinacademy.yez.vn/tin-chi-tiet' + this.$route.params.tintucId + ' "><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li class="google">
                                                    <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
                                                </li>
                                                <li class="instagram">
                                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                                </li>
                                            </ul> -->
                                            <social-sharing url="https://webhero.vn/top-3-mau-website-ban-hang-chuyen-nghiep-moi-cap-nhat-thang-5-nd-8939"
                                                              title=""
                                                              description=""
                                                              quote=""
                                                              hashtags="vinacademy"
                                                              twitter-user="vinacademy"
                                                              inline-template
                                                              >
                                                <div>
                                                    <network network="twitter" class="network">
                                                        <i class="fa fa-twitter"></i>
                                                    </network>
                                                    <network network="facebook" class="network">
                                                        <i class="fa fa-facebook"></i>
                                                    </network>
                                                    <network network="googleplus" class="network">
                                                        <i class="fa fa-google-plus"></i>
                                                    </network>
                                                    <network network="instagram" class="network">
                                                        <i class="fa fa-instagram"></i>
                                                    </network>
                                                    <network network="pinterest" class="network">
                                                        <i class="fa fa-pinterest-p"></i>
                                                    </network>
                                                </div>
                                            </social-sharing>
                                        </div><!-- /.share-post -->      
                                    </div><!-- /.wrap-share -->
                                    <div>
                                         
                                    </div>
                                </div><!-- /.entry-border -->
                            </article><!-- /entry clearfix -->

                            <div class="comment-post">
                                <div class="comment-list-wrap">
                                    <h4 class="title comment-title">Comment ( {{ comment.length }} ) </h4>
                                    <ul class="comment-list">
                                        <li v-for="data in comment">
                                            <article class="comment">
                                                <div class="comment-avatar">
                                                    <img src="/images/blog/1.jpg" alt="image">
                                                </div>                  
                                                <div class="comment-detail">
                                                    <div class="comment-meta">
                                                        <p class="comment-author"><a href="#"> {{ data.name }} </a></p> 
                                                        <p class="comment-date"><a href=""> {{ data.created_at.date }} </a></p> 
                                                    </div>

                                                    <p class="comment-body"> {{ data.content }} </p>
                                                    <a href="#" class="comment-reply">Reply</a>
                                                </div><!-- /.comment-detail -->
                                            </article><!-- /.comment -->
                                        </li>
                                    </ul><!-- /.comment-list -->
                                </div><!-- /.comment-list-wrap -->

                                <div id="respond" class="comment-respond">
                                    <h4 class="title comment-title style1">Leave a comment</h4>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <form class="flat-contact-form" id="contactform" method="posts">
                                    
                                        <input type="text" value="" tabindex="1" placeholder="Name*" name="name" id="name" v-model="name"   v-validate="'required'">
                                            
                                        
                                        <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email-contact"  v-model="email" v-validate="'required|email'">
                                            <label>{{ errors.first('name') }}</label>
                                            <label>{{ errors.first('email') }}</label>
                                        

                                        <textarea class="type-input" tabindex="3" placeholder="Comment*" name="content" id="message-contact"  v-model="content" required="" v-validate="'required'"></textarea>
                                            <label>{{ errors.first('content') }}</label>   
                                        
                                    </form>
                                    <button class="flat-button bg-orange" @click="sendcmt"  >Post Comment</button>
                                </div><!-- /#respond -->
                            </div><!-- /.comment-post -->
                        </div><!-- /blog-title-single -->
                    </div><!-- /col-md-8 -->
                    <div id="app">
                        <sidebarn></sidebarn>
                        
                    </div>
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /main-content -->
    </div>    
</template>
<style type="text/css">
    .network{
        padding-right: 18px;
        font-size: 18px;
    }
    .network i{
        color: #999;
    }
    .network i:hover{
        color: #feb800;
    }
</style>
<script type="text/javascript">
    import main from './javascripts/main.js';
    import  switcher from './javascripts/switcher.js';

        // $(document).ready(function() {
        //     $('#fb-share').click(function(e) {
        //         e.preventDefault();
        //         window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        //         return false;
        //     });
        // });

    // document.getElementById('shareBtn').onclick = function() {
    //     FB.ui({
    //         method: 'share',
    //         display: 'popup',
    //         href: 'http://vinacademy.yez.vn/tin-chi-tiet',
    //     }, function(response){});
    // }


    export default{
        data(){
            return {
                dl:{},
                comment:[],
                name:'' , email: '', content: ''
            }
        },
        created:function(){
            //this.danhsach_user();
            this.axios.get('/api/news/detail?alias=' + this.$route.params.tintucId + ' ').then((response) => {
                 this.dl=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
            this.axios.get('/api/news-comment/list?alias=' + this.$route.params.tintucId + '').then((response) => {
                 this.comment=response.data.data;
                 // console.log('aaaaaaaaaa', response.data.data)
            });
        },

        
        methods:{
            sendcmt:function(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.axios.post('/api/news-comment/checkcomment', {name: this.name, email: this.email, content: this.content, parent_id:'0',
                        news_id:this.dl.id
                        })
                        .then((response) => {this.name='', this.email='', this.content=''});
                        alert('thanh cong')
                        return;
                    }
                    if(!result){
                                       
                    }
                })
                
            },
        }      
    }
</script>






        
      
