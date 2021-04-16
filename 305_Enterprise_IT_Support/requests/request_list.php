<?php include '../view/header.php'?>
<script>

var my_new_button_builder = function(id){
    var result = '<a href="index.php?id=' + id + '">Close this</a>';
    return result;
};

var my_new_row_builder = function(row){
    var result = '<tr>';
    result = result + '<td>' + row['request_id'] + '</td>';
    result = result + '<td>' + row['firstname'] + '</td>';
    result = result + '<td>' + row['lastname'] + '</td>';
    result = result + '<td>' + row['room'] + '</td>';
    result = result + '<td>' + row['problem_type'] + '</td>';
    result = result + '<td>' + row['comments'] + '</td>';
    result = result + '<td>' + row['status'] + '</td>';
    result = result + '<td>' + my_new_button_builder(row['request_id']) + '</td>';
    result = result + '</tr>';
    return result;
};

$(document).ready(function(){    
    //here's where we populate the table with data
        $.getJSON('../services?list',function(data){
            for(var i=0;i<data.length;i++) {
                var my_new_row = my_new_row_builder(data[i]);
                $("#mytable").append(my_new_row);
            }
        });
});
</script>    
<table class="table table-condensed" id="mytable">
    <thead>
    <tr>
        <th>Request Id</th>
        <th>Teacher First Name</th>
        <th>Teacher Last Name</th>
        <th>Room</th>
        <th>Problem Type</th>
        <th>Comments</th>
        <th>Status</th>
        <th>Action</th>        
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<p><a href="../people/index.php?logout">Logout</a></p>
    
<?php include '../view/footer.php'?>