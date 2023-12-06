var isPending = false;
var isDecimal = 0;

function convert (entryform, from, to)
{
convertfrom = from.selectedIndex;
conertto = to.selectedIndex;
entryform.display.value = (entryform.input.value * from[convertfrom].value / to[convertto].value);

}

function addchar (input, character){
    if((character == '.' && isDecimal=='0') || character!='.')
    {
        (input.value == "" || input.value=="0") ? input.value = character : input.value +=character
        convert(input.form,input.form.measure1,input.form.measure2)
        isPending = true;
        if(character==".")
        {
            isDecimal=1;
        }

    }
}

function openVothom(){
    window.open("", "Display window", "toolbar=no,directories=no,menubar=no")
}

function clear (form){
    form.input.value=0;
    form.display.value =0;
    isDecimal=0;

}
function changeBackgroundColor(hexNumber){
    document.bgColor = hexNumber;
}

// skoro tło można zmienić to chce zmienić też kolor daty i czasu

function changeDateColor(hexNumber){
    document.getElementById("zegarek").style.color = hexNumber;
    document.getElementById("data").style.color = hexNumber;

}






