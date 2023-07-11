(function($) {

  $('#meal_preference').parent().append('<ul class="list-item" id="newmeal_preference" name="meal_preference"></ul>');
  $('#meal_preference option').each(function(){
      $('#newmeal_preference').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
  });
  $('#meal_preference').remove();
  $('#newmeal_preference').attr('id', 'meal_preference');
  $('#meal_preference li').first().addClass('init');
  $("#meal_preference").on("click", ".init", function() {
      $(this).closest("#meal_preference").children('li:not(.init)').toggle();
  });

  var allOptions = $("#meal_preference").children('li:not(.init)');
  $("#meal_preference").on("click", "li:not(.init)", function() {
      allOptions.removeClass('selected');
      $(this).addClass('selected');
      $("#meal_preference").children('.init').html($(this).html());
      allOptions.toggle();
  });

  var marginSlider = document.getElementById('slider-margin');
  if (marginSlider != undefined) {
      noUiSlider.create(marginSlider, {
            start: [500],
            step: 10,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 0,
                'max': 1000
            },
            format: wNumb({
                decimals: 0,
                thousand: ',',
                prefix: '$ ',
            })
    });
  }

  $('#reset').on('click', function(){
      $('#register-form').reset();
  });

  $('#submit').on('click', function(e){
    e.preventDefault();
    clearErr();
    
    const _csrfToken = $('meta[name="csrf-token"]').attr('content');
    const firstName = $('#first_name').val();
    const lastName = $('#last_name').val();
    const companyName = $('#company').val();
    const email = $('#email').val();
    const phoneNumber = $('#phone_number').val();
    const sex = $('.selected').attr('value');
    const paymentMethod = getPaymentMethod();
    const cardNumber = $('#chequeno').val();
    const expiredDay = $('#blank_name').val();
    const cvn = $('#payable').val();
    const amount = 10 * $('.noUi-handle').attr('aria-valuenow');
    
    const donationData = {
        firstName: firstName,
        lastName: lastName,
        companyName: companyName,
        email: email,
        phoneNumber: phoneNumber,
        sex: sex,
        paymentMethod: paymentMethod,
        cardNumber: cardNumber,
        expiredDay: expiredDay,
        cvn: cvn,
        amount: amount
    }

    $.ajax({
      type: 'POST',
      url: 'donation',
      headers: {
          'X-CSRF-TOKEN': _csrfToken
      },
      data: donationData,
      success: function(response){
        printMsg(response);
      }
    });
  });

  function printMsg (msg) {
    if($.isEmptyObject(msg.error)){
        $('.alert-block').css({'display': 'block', 'color': 'green', 'margin-bottom': '20px'}).append('<strong>'+msg.success+'</strong>');
    }else{
      $.each( msg.error, function( key, value ) {
        $('#' + key + '_err').css('color', 'red').text(value);
      });
    }
  }

  function getPaymentMethod(){
    const payments = document.querySelectorAll('input[name="payment"]');
    var selectedPaymentMethod = '';

    for (const payment of payments) {
        if (payment.checked) {
            selectedPaymentMethod = payment.value;
            break;
        }
    }

    return selectedPaymentMethod;
  }
  
  function clearErr(){
    $('.donation-error').text('');
    $('.alert-block').css({'display': 'none'});
  }

})(jQuery);