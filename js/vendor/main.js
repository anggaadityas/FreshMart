
  // other products slider  
  $('#other-prod-slider').pajinate({
    items_per_page : 4,
    item_container_id : '.other-products',
    nav_panel_id : '.navigation',
    num_page_links_to_display : 0,
    show_first_last : false,
    wrap_around : true
  });
  
      // mobile approach
  
  if ( $(window).width() < 768 ) {
    unPajinatedOP();
  }
  
  $(window).resize(function() {
    if ( $(window).width() > 767 ) {
      pajinatedOP()
    } else {
      unPajinatedOP()
    }
  });
  
  function pajinatedOP() {
    $('.other-products ').css('display', 'none');
    $('.other-products ').slice(0, 4).css('display', 'block');
    $('#other-prod-slider .navigation').show();
  }
  function unPajinatedOP() {
    $('.other-products ').css('display', 'block');
    $('#other-prod-slider .navigation').hide();
  }
