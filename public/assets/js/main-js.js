(function($) {
    let popup_content = $('#popup');
    let close_btn_popup = $('.close-pop');
    let open_btn_popup = $('#rdv');

    open_btn_popup.on( "click", function() {
        popup_content.css('display', 'block');
      } );

      close_btn_popup.on( "click", function() {
        popup_content.css('display', 'none');
      } );
})(jQuery);

