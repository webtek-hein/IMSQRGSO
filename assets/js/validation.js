$( 'input[type=number]' ).on('keypress paste',function () {

    var x = event.charCode;
    if(x === 101 || x === 45 || x === 43 || x === 69){
        return false;
    }
});
//text validations
//Only [A-Za-z] allowed
$('input[type=text]').keypress(function () {
    var x = event.charCode;
    if(!(x >= 65 && x <= 122) && x !== 32 || x === 95 || x === 94 || x === 92){
        return false;
    }
});

$( 'input[name^=cost]' ).on('keypress paste',function () {
    var x = event.charCode;
    if(x === 101 ||  x === 45 || x === 43 || x === 69){
        return false;
    }
});

$('input[name^=del]').on('blur',function () {
   var delDate = $(this).val();
   var recDate = $('input[name^=rec]').val();
   var expDate = $('input[name^=exp]').val();

   if(recDate !== ''){
       if(delDate > recDate){
           $(this).val('');
           $('.del-error-msg').html('Delivery date must not be greater than date received.');
       }
   }
   if(expDate !== ''){
       if(delDate > expDate){
           $(this).val('');
           $('.del1-error-msg').html('Delivery date must not be greater than expiration date.');
       }
   }
});

$('input[name^=rec]').on('blur',function () {
    var recDate = $(this).val();
    var delDate = $('input[name^=del]').val();
    var expDate = $('input[name^=exp]').val();

    if(delDate !== ''){
        if(recDate < delDate ){
            $(this).val('');
            $('.rec-error-msg').html('Delivery received must not be less than date delivered.');
        }else{
            $('.rec-error-msg').html('');
        }
    }
    if(expDate !== ''){
        if(recDate > expDate){
            $(this).val('');
            $('.rec1-error-msg').html('Date received must not be greater than expiration date.');
        }else{
            $('.rec1-error-msg').html('');
        }
    }
});

$('input[name^=exp]').on('blur',function () {
    var expDate = $(this).val();
    var delDate = $('input[name^=del]').val();
    var recDate = $('input[name^=rec]').val();

    if(delDate !== ''){
        if(expDate < delDate ){
            $(this).val('');
            $('.exp-error-msg').html('Expiration date must not be less than date delivered.');
        }else{
            $('.exp-error-msg').html('');
        }
    }
    if(recDate !== ''){
        if(expDate < recDate){
            $(this).val('');
            $('.exp1-error-msg').html('Expiration date must not be less than date received.');
        }else{
            $('.exp1-error-msg').html('');
        }
    }
});
