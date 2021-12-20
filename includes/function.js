function prodType(prod){
    $('#dvd').hide().find('input, textarea').prop('disabled', true);
    $('#book').hide().find('input, textarea').prop('disabled', true);
    $('#furniture').hide().find('input, textarea').prop('disabled', true);

    if(prod=="dvd"){
      $('#dvd').show().find('input, textarea').prop('disabled', false);
      $('#desc').html('*Please Enter Your Dvd Size in Mb');
    }else if(prod=="book"){
      $('#book').show().find('input, textarea').prop('disabled', false);
      $('#desc').html('*Please Enter Your Book Weight in Kg');
    }else if(prod=="furniture"){
      $('#furniture').show().find('input, textarea').prop('disabled', false);
      $('#desc').html('*Please Enter Your Furniture Size in LxWxH Format');
    }
  }