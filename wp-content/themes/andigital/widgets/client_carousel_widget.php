<?
// Creating the widget 
class client_carousel_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'client_carousel_widget', 

		// Widget name will appear in UI
		__('Client Carousel', 'client_carousel_widget_domain'), 

		// Widget description
		array( 'description' => __( 'client carousel slide image show', 'client_carousel_widget_domain' ), ) 
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ){
	$title = apply_filters( 'widget_title', $instance['title'] );

//----------------------------------------------------------------------------------------------------
//Widget HTML start
//----------------------------------------------------------------------------------------------------
?>
	
    <script type="text/javascript">
        /**
         * Simple Carousel
         * Copyright (c) 2010 Tobias Zeising, http://www.aditu.de
         * Licensed under the MIT license
         * 
         * http://code.google.com/p/simple-carousel/
         * Version 0.3
         */


        /*(function($){
        	 $.fn.simplecarousel = function( params ) {
        	     // set config
        	     var defaults = {
        	         width: 1000,
        	         height: 400,
        	         next: false,
        	         prev: false,
        	         vertical: false,
        	         auto: false,
        	         fade: false,
        	         current: 0,
        	         items: 0,
        	         slidespeed: 600,
        	         visible: 1,
        	         pagination: false,
        	         paginationItem: function( index ) {
        	             return '';
        	         },
        	         pauseOnClick: false
        	     };
        	     var config = $.extend(defaults, params);

        	     config.defaultWidth = config.width;
        	     config.defaultHeight = config.height;
        	     
        	     var timer = undefined;
        	     
        	     var carousel = {};
        	     carousel.resize = function(){
            	     if (timer) {
                	     clearTimeout(timer);
                	     timer = undefined;
            	     }

            	     var width;
            	     var height;
            	     
            	     if ($(window).width() > 500) {
		        	     width = Math.round($(window).width() - 100);
		        	     height = Math.round(width * (config.defaultHeight / config.defaultWidth));
            	     } else {
		        	     width = Math.round($(window).width());
		        	     height = Math.round(width * (config.defaultHeight / config.defaultWidth));
            	     }
	        	         
    	             config.width = width;
    	             config.height = height;
	        	         
	        	     if ( $( ".carousel-frame" ).length == 0) {
	        	        ul.wrap('<div class="carousel-frame" style="width:'+width+'px;height:'+height+'px;overflow:hidden;margin:auto;display:inline-block">');
	        	     }
	        	     else {
	        	        $( ".carousel-frame" ).attr("style", 'width:'+width+'px;height:'+height+'px;overflow:hidden;margin:auto;display:inline-block');
	        	     }
	        	     var container = ul.parent('.carousel-frame');
	        	     if(!config.vertical) {
	        	         ul.width(config.items*config.width);
	        	         ul.height(config.height);
	        	     } else {
	        	         ul.width(config.width);
	        	         ul.height(config.items*config.height);
	        	     }
	        	     ul.css('overflow','hidden');
	        	     
	        	     li.each(function(i,item) {
	        	         $(item).width(config.width);
	        	         $(item).height(config.height);
	        	         if(!config.vertical)
	        	             $(item).css('float','left');

    	            ul.css({marginLeft: -1.0*config.current*config.width});
				});
        	     
        	     // function for sliding the carousel
        	     var slide = function(dir, click) {
        	         
        	         if(typeof click == "undefined" & config.auto==false)
        	             return;
        	     
        	         if(dir=="next") {
        	             config.current += config.visible;
        	             if(config.current>=config.items)
        	                 config.current = 0;
        	         } else if(dir=="prev") {
        	             config.current -= config.visible;
        	             if(config.current<0)
        	                 config.current = (config.visible==1) ? config.items-1 : config.items-config.visible+(config.visible-(config.items%config.visible));
        	                 if(config.current == config.items){
        	                     config.current = config.items-config.visible;
        	                 }
        	         } else {
        	             config.current = dir;
        	         }
        	         
        	         // set pagination
        	         if(config.pagination != false) {
        	             container.next('.pagination').find('.carousel-pagination').find('li').removeClass('carousel-pagination-active')
        	             container.next('.pagination').find('.carousel-pagination').find('li:nth-child('+(config.current+1)+')').addClass('carousel-pagination-active');
        	             
        	         }
        	         
        	         // fade
        	         if(config.fade!=false) {
        	             ul.fadeOut(config.fade, function() {
        	                 ul.css({marginLeft: -1.0*config.current*config.width});
        	                 ul.fadeIn(config.fade);
        	             });
        	             
        	         // slide
        	         } else {
        	             if(!config.vertical)
        	                 ul.animate( {marginLeft: -1.0*config.current*config.width}, config.slidespeed );
        	             else
        	                 ul.animate( {marginTop: -1.0*config.current*config.height}, config.slidespeed );
        	         }
        	         
        	         if(typeof click != "undefined")
        	             config.auto = false;
        	         
         	         if(config.auto) {
             	         if (timer == undefined) {
	         	             timer = setInterval(function() {
	         	                 slide('next');
	         	             }, config.auto);
             	         }
         	         } else {
             	         if (timer != undefined) {
         	         		clearInterval(timer);
             	         	timer = undefined;
             	         }
         	         }
        	     }
        	     
        	     // include pagination
        	     if(config.pagination != false) {
        	         if ( $( ".pagination" ).length == 0) {
	        	         container.after('<div class="pagination" style="text-align:center;"><ul class="carousel-pagination" style="display:inline-block;padding:0;"></ul></div>');
        	         }
        	         else {
        	             $( ".pagination" ).attr("style", 'text-align:center;"><ul class="carousel-pagination" style="display:inline-block;padding:0;');
        	         }
        	         var pagination2 = container.next('.pagination');
        	         var pagination = pagination2.find('.carousel-pagination');
	        	         
        	         if (pagination2.find('.carousel-pagination li').length < config.items) {
	        	         for(var i=0;i<config.items;i++) {
	        	             if(i==0)
	        	                 pagination.append('<li class="carousel-pagination-active">' + config.paginationItem(i + 1) + '</li>');
	        	             else
	        	                 pagination.append('<li>' + config.paginationItem(i + 1) + '</li>');
	        	         }
        	         }

        	         pagination.find('li').each(function(index, item) {
        	             $(this).click(function() {
        	                 slide(index,true);
        	             });
        	         });
        	     }
        	     
        	     // start auto sliding
        	     if(config.auto!=false)
        	    	 timer = setInterval(function() {
        	             slide('next');
        	         }, config.auto);
        	     };    
        	     
        	     // configure carousel ul and li
        	     var ul = $(this);
        	     var li = ul.children('li');
        	     
        	     if(config.pauseOnClick) {
        	         li.bind('click', function () {
        	             config.auto = false;
        	         });
        	     }
        	     
        	     config.items = li.length;
        	     
        	     var height = config.height;
        	     var width = config.width;
        	     if(config.visible>1) {
        	         if(config.vertical)
        	             height = height*config.visible;
        	         else
        	             width = width*config.visible;
        	     }
        	     carousel.resize();
        	     
        	     $(window).resize(function(){
        	        carousel.resize();
        	 	});
        	 }
       	})(jQuery);        
        
		jQuery(document).ready(function() {
             
             // carousel-list
             $("ul.carousel-list").simplecarousel({
                 width:1000,
                 height:400,
                 auto: 4000,
                 fade: 400,
                 next: $('.next'),
                 prev: $('.prev'),                
                 pagination: true
             });
        });

        */

        (function($) {

            var $descriptions = $('#carousel-descriptions').children('li'),
                $controls = $('#carousel-controls').find('span'),
                $carousel = $('#carousel')
                    .roundabout({childSelector:"img", minOpacity:1, autoplay:true, autoplayDuration:5000, autoplayPauseOnHover:true })
                    .on('focus', 'img', function() {
                        var slideNum = $carousel.roundabout("getChildInFocus");

                        $descriptions.add($controls).removeClass('current');
                        $($descriptions.get(slideNum)).addClass('current');
                        $($controls.get(slideNum)).addClass('current');
                    });

            $controls.on('click dblclick', function() {
                var slideNum = -1,
                    i = 0, len = $controls.length;

                for (; i<len; i++) {
                    if (this === $controls.get(i)) {
                        slideNum = i;
                        break;
                    }
                }

                if (slideNum >= 0) {
                    $controls.removeClass('current');
                    $(this).addClass('current');
                    $carousel.roundabout('animateToChild', slideNum);
                }
            });

        }(jQuery));


    </script>
    
    <style>

        /*
        .next,
        .prev {
            cursor:pointer;
        }
        
        #carousel {
        	margin-top:50px;
        	margin-bottom:50px;
        	text-align:center;
        }
        
        #carousel h2 {
        	margin-bottom:100px;
        }
        
        .carousel-list {
            margin:0;
            padding:0;
            list-style:none;
            width: 100%;
            height: 100%;
            overflow:hidden;
        }
        
        .carousel-list li {
            text-align:left;
            display:block;
            width: 100%;
            height: 100%;
		}
        
        .carousel-list li img {
            width: 100%;
            height: 100%;
		}
        
        .carousel-pagination li {
            display:block;
            width:10px;
            height:10px;
            margin-right:5px;
            cursor:pointer;
            float:left;
            background:#333;
             -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;           
        }
        
        .carousel-pagination .carousel-pagination-active {
            background:#ff0000;
        }
        */
        body{background:#FFFFFF ; color:#eee;}
        .roundabout-holder {
            padding: 0;
            margin: 0 auto;
            height: 400px;
            width: initial;
            max-width:900px;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;

        }

        .roundabout-moveable-item {
            height: 400px;
            width: 320px;
            cursor: pointer;

            display:block;
        }

        .roundabout-moveable-item img {
            height: 100%;
            width: 100%;
        }

        .roundabout-in-focus {
            cursor: auto;
        }





        #carousel-descriptions {
            list-style:none;
            display:block;
            width:850px;
            margin:25px auto;
            padding:0;
            font-size: 1.1em;
            color: #8a8e99 ;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
        }

        #carousel-descriptions li {
            font-size: 1.1em;

            text-align:center;
            display:none;
            font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
        }

        #carousel-descriptions li.current {
            display:block;
        }


    </style>    	

<div id="carousel">


	<img src="<? echo wp_get_attachment_url($instance['image1']);?>" alt="" class="slide" />
	<img src="<? echo wp_get_attachment_url($instance['image2']);?>" alt="" class="slide" />
	<img src="<? echo wp_get_attachment_url($instance['image3']);?>" alt="" class="slide" />

<!--
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide4.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide5.png" alt="" class="slide" />
	<img src="<? getThemeDir(); ?>/img/what-we-do/slide6.png" alt="" class="slide" />
	-->
</div>

<ul id="carousel-descriptions">
	<li class="desc current">Whitbread<br>
    <p>we did some realy cool stuff for Whitbread</p>
    </li>
	<li class="desc">Argosknfjksnkjs<br>
    <p>did some stuff for Argos too</p>
    </li>
    
	<li class="desc">Travis Perkins<br>
    <p>did some stuff for TP too</p></li>

	
</ul>

<div id="carousel-controls">
	<span class="control current"></span>
	<span class="control"></span>
	<span class="control"></span>

	
</div>

<!-- page content --><div id="page-content">

<?
//----------------------------------------------------------------------------------------------------
//Widget HTML end
//----------------------------------------------------------------------------------------------------
}





//----------------------------------------------------------------------------------------------------
//Widget Admin
//----------------------------------------------------------------------------------------------------
public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New title', 'carousel_widget_domain' );
	}
	pco_image_field( $this, $instance,array( 'title' => 'Feature Image', 'field' => 'image1' ));
	pco_image_field( $this, $instance,array( 'title' => 'Feature Image', 'field' => 'image2' ));
	pco_image_field( $this, $instance,array( 'title' => 'Feature Image', 'field' => 'image3' ));

?>



<!-- admin form start -->

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<!-- admin form end -->



<?
}//form

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['image1'] = ( ! empty( $new_instance['image1'] ) ) ? strip_tags( $new_instance['image1'] ) : '';
	$instance['image2'] = ( ! empty( $new_instance['image2'] ) ) ? strip_tags( $new_instance['image2'] ) : '';
	$instance['image3'] = ( ! empty( $new_instance['image3'] ) ) ? strip_tags( $new_instance['image3'] ) : '';
	
			
	return $instance;
}
} // Class carousel_widget ends here
?>
