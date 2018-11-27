jQuery(function($){
  $(document).on('click', '.loadmore', function(event){
 
    var button = $(this),
        data = {
      'action': 'loadmore',
      'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
      'page' : loadmore_params.current_page
    };
 
    $.ajax({
      url: loadmore_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        button.text('Загружаем...'); // change the button text, you can also add a preloader image
      },
      success : function( data ){
        if( data ) { 
          button.text( 'Загрузить еще' ).prev().before(data); // insert new posts          
          loadmore_params.current_page++;
          $('.photoalbums .container .row:nth-child(2)').append(data);

          if ( loadmore_params.current_page == loadmore_params.max_page ) 
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