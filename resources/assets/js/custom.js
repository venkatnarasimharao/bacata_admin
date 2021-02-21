(function($) {
  
  "use strict";  
  $( document ).ready(function() {
    // Session Popup
    $('.sessionmodal').addClass("active");
    setTimeout(function() {
        $('.sessionmodal').removeClass("active");
    }, 4000);
    

  //Select2
  $('.select2').select2({
    tags: true,
    tokenSeparators: [',']
  });
  
  //Date picker
  $('.date-picker').datepicker({
    autoclose: true,
  });

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false,
  });

  $(".bootswitch").bootstrapSwitch();
  $('.dropdown-toggle').dropdown();
  $('[data-toggle="tooltip"]').tooltip({animation: true, delay: {show: 300, hide: 300}});   

  $('.input-file').each(function() {
      var $input = $(this),
          $label = $input.next('.btn'),
          labelVal = $label.html();
      
       $input.on('change', function(element) {
          var fileName = '';
          if (element.target.value) fileName = element.target.value.split('\\').pop();
          fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
       });
    });

})(jQuery);
