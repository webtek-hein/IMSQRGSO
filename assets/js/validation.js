$( "input[type=number]" ).on("keypress paste",function () {

    var x = event.charCode;
    if(x === 101 || x === 45 || x === 43 || x === 69){
        return false;
    }
});
$( "input[name=rec]" ).on("blur",function () {
    del_date = new Date($('input[name=datedelivered]').val());
    date_rec = new Date($('input[name=datereceived]').val());

    if(del_date > date_rec){
        $(this).val('');
    }
});

$( "input[name=exp]" ).on("blur",function () {
    date_rec = new Date($('input[name=datereceived]').val());
    exp_date = new Date($('input[name=ExpirationDate]').val());

    if(exp_date < date_rec || exp_date === date_rec){
        $(this).val('');
    }
});
$('input[type=text]').keypress(function () {
    var x = event.charCode;
    if(x >= 0 && x <= 64 && x !== 32){
        return false;
    }
});