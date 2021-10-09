/* Adding the script tag to the head as suggested before */

var head = document.getElementsByTagName('head')[0];
var script = document.createElement('script');
script.type = 'text/javascript';
script.src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

// Then bind the event to the callback function.
// There are several events for cross browser compatibility.
script.onreadystatechange = handler;
script.onload = handler;

// Fire the loading
head.appendChild(script);

function handler(){
    var count = 0;
    $("#navbar").click(function () {
        count++;
        if(count >= 3){
            $(".div_logo_hide").removeClass( "div_logo_hide" );
            $(".brand").remove();
            
        }
    });

}