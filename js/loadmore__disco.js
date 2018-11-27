jQuery(function($){
  $('.loadmore__disco').click(function(){
    var button = $(this),
        data = {
      'action': 'loadmore__disco',
      'query': loadmore_params__disco.posts, // that's how we get params from wp_localize_script() function
      'page' : loadmore_params__disco.current_page
    };
 
    $.ajax({
      url: loadmore_params__disco.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        button.text('Загружаем...'); // change the button text, you can also add a preloader image
      },
      success : function( data ){
        if( data ) { 
          button.text( 'Загрузить еще' ).prev().before(data); // insert new posts          
          loadmore_params__disco.current_page++;
          $('.disco .container .row:last-child').before(data);

          if ( loadmore_params__disco.current_page == loadmore_params__disco.max_page ) 
            button.remove(); // if last page, remove the button
 
          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
});