<?php include '../view/header.php'?>

<div id="whiteboard" class="jumbotron">
    <h2>Whiteboard</h2>
    <p>There are no open tickets at this time.</p>
</div>
<p><a href="../people/index.php?logout">Return to Main Menu</a></p>

<?php include '../view/footer.php'?>'

<script>
    
    
var ajax_get_ticket = function(target_id){
        //go get the data
        $.getJSON("../services/?random", function(result) { 
            renderHTML(result,target_id);
        });
};



var renderHTML = function(my_div_data,target_id){
    var my_div = $("#"+target_id);
    my_div.html('<h2>Whiteboard</h2>');
    if (my_div_data.length !== 0) {
        my_div.append('Confirmation ID: ' + my_div_data['confirmation'] + '<br>');
        my_div.append('Name: ' + 
                my_div_data['firstname'] + ' ' + my_div_data['lastname'] + '<br>');               
        my_div.append('Room: ' + my_div_data['room'] + '<br>');
        my_div.append('Problem: ' + my_div_data['problem_type'] + '<br>');
        my_div.append('Comments: ' + my_div_data['comments'] + '<br>');
    } else {
        my_div.append('<p>Congratulations!! There are no open tickets at this time.</p>');
    };  
};

$(document).ready(function(){
    ajax_get_ticket('whiteboard');
    
    setInterval(function(){ajax_get_ticket('whiteboard');},5000);
    });

</script>    
