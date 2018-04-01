$(document).ready(function () {
    var cal  = new WinkelCalendar({
        container: 'demo',
        bigBanner: true,
        defaultDate: '2016-1-12',
        format : "DD/MM/YYYY",
        onSelect : onDateChange

    });
    window.onload = function () {

    }
    function onDateChange(date){
        //document.getElementById('container2').innerHTML = date;
    }
});

$(document).ready(function () {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');
});
