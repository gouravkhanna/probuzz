var count=0;
$("docment").ready(function(){
    $("#notifications").load("index.php","controller=notifications");
    setInterval(function(){$("#notifications").load("index.php","controller=notifications");},5000);
    
});