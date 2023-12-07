function gettheDate(){
    today = new Date();
    theDate = '' + (today.getMonth()+1) + ' / ' + today.getDate() + ' / ' + (today.getYear()-100);
    document.getElementById('data').innerHTML = theDate;
}

var timerID = null;
var timerRunning = false;

function stopclock(){
    if(timerRunning)
    {
        clearTimeout(timerID);
        timerRunning=false;
    }
}

function startclock(){
    stopclock();
    gettheDate();
    showtime();
    showbetterdate();
}
function showtime(){
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = '' + ((hours > 12) ? hours -12 :hours)
    timeValue += ((minutes < 10) ? ':0' : ':') + minutes
    timeValue += ((seconds <10) ? ":0" : ':') + seconds
    timeValue += (hours >=12 ) ? " P.M." : ' A.M.'
    document.getElementById("zegarek").innerHTML = timeValue;
    timerID = setTimeout("showtime()",1000);
    timerRunning=true;
}
function showbetterdate(){
    var now = new Date();
    var day = now.getDate();
    var month = now.getMonth()+1;
    var year = now.getYear()-100;
    var date = "dziś jest "+ day + " / " + month + " roku " + 20+year + " !";
    document.getElementById('fajna_data').innerHTML = date;

}
