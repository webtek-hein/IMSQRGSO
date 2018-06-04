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
$( 'input[name^=cost]' ).on('blur',function(){
    var value = parseFloat($(this).val());
    if(isNaN(value)){
        $(this).val('');
        $('.cost-err-msg').html('Invalid Cost.');
    }else{
        $(this).val(value);
        $('.cost-err-msg').html('');
    }
})
$('#tin').on('blur',function () {
    var tin = $(this).val();
    var tinRegex = /^(?:\d{4}-\d{4}-\d{4})$/;
    console.log(
    );
    if(tin !== ''){
        if(!tinRegex.test(tin)){
            $(this).val('');
            $('.tin-err-msg').html('Enter a valid tin number: XXXX-XXXX-XXXX');
        }else{
            $('.tin-err-msg').html('');
        }

    }
})

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
    var today = new Date();
    var currentDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var inputToDate;
    var todayToDate;


    if(expDate !== '') {
        inputToDate = Date.parse(expDate);
        todayToDate = Date.parse(currentDate);
        if (inputToDate < todayToDate) {
            $(this).val('');
            $('.exp2-error-msg').html('Expiration date must not be less than the current date.');
        }else{
            $('.exp2-error-msg').html('');
        }
    }
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

$('#date').on('blur',function () {
    var delDate = $(this).data('deldate');
    var dateDistributed = $(this).val();
    if(dateDistributed !== ''){
        if(delDate > dateDistributed){
            $(this).val('');
            $('.dist-error-msg').html('Expiration date must not be less than date delivered.');
        }else{
            $('.dist-error-msg').html('');
        }
    }
});




$('input[name=returndate]').on('blur',function () {
    var delDate = $(this).data('deldate');
    var returnDate = $(this).val();
    if(returnDate !== ''){
        if(delDate > returnDate){
            $(this).val('');
            $('.ret-error-msg').html('Return date must not be less than date delivered.');
        }else{
            $('.ret-error-msg').html('');
        }
    }
});

//validate transfer on the same name
$('input[name=transfername]').on('blur',function () {
   var currUser = ''+$('input[name=currentuser]').val().toLowerCase().replace(String.fromCharCode(160),' ');
   var newUser = ''+$(this).val().toLowerCase().trim();

   if(currUser === newUser){
       alert('Item cannot be transfered to the same user.');
       $(this).val('');
   }
});
