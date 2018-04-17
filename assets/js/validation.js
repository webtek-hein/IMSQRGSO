$( "input[type=number]" ).on("keypress paste",function () {

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