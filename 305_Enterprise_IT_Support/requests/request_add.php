<?php include '../view/header.php'?>
<script>
   


    var validate = function(event){
        var room = $('#room').val();
        var problem_type = $('#problem_type').val();
        
        var result = true;
        
        $('#message').html("<div class='alert alert-danger'><ul></ul></div>");
        
        if (room === "" || room.length < 1)
                {
                $('#message ul').append("<li>You must provide a room.</li>");
                event.preventDefault();
                result = false;
                }
        if (problem_type === "")
                {
                $('#message ul').append("<li>You must provide a problem type.</li>");
                event.preventDefault();
                result = false;
                }
        
        
        if (sessionStorage.getItem("lastSuccess") === null){
            if (result === true){
                var d = new Date();
                sessionStorage.lastSuccess = d.getTime();
            }
        } else {
            var d1 = new Date();
            var d2 = new Date(Number(sessionStorage.lastSuccess) + 30000);

            if ( d1.getTime() < d2.getTime() ){
                $('#message ul').append("<li>Please wait at least 30 seconds.  Help is on the way.</li>");
                event.preventDefault();
                result = false;
            } else {
                result = true;
                var d = new Date();
                sessionStorage.lastSuccess = d.getTime();
            }
        }
        
        if (result){
            //if there is nothing to show, blank out the message
            $('#message').html("");
        } 
        
        return result;
    }

    //tell the browser what to do when the document is ready
    
    $(document).ready(function() {
        //here's what to do when the form is submitted
        $('#requestform').submit(function(event){return validate(event);});

        //here's what to do when the button is clicked
        $('#addrequest').click(function(event){
                $('#requestform').submit();
            });
        
        //here's where we populate the select tag with options
        $.getJSON('../services?problemtypes',function(data){
            for(var i=0;i<data.length;i++) {
                var my_new_option = '<option>' + data[i]['type']  + '</option>';
                $("#problem_type").append(my_new_option);
            }
        });
    });
</script>
        
    <form id="requestform" action="index.php" method="post">
        
    <fieldset>
    <legend>Your Username: <?php echo $username;?></legend>
    <input type="hidden" name="first_name" value="<?php echo $username; ?>">
    <input type="hidden" name="last_name" value="<?php echo $teacher_id; ?>">       
    </fieldset>
        
    <fieldset>
    <label for="room">* Room:</label> <input type="text" id="room" name="room" value="<?php echo $room; ?>"><br>
    <label for="problem_type">* Problem Type:</label> 
    <select id="problem_type" name="problem_type">
        <option value=''>Please make a choice</option>
    </select><br>
    <label for="comment">Comment:</label> 
    <textarea id="comment" name="comment" height="5" width="30"><?php echo $comment;?></textarea>
    
    </fieldset>
        
    <div id="buttons">
    <div class="label">&nbsp;</div>
    <input type="hidden" name="ADDREQUEST">
    <a href="#" id="addrequest" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Request</a><br><br>
    <br>
    </div>
        
    <div id="message">
    <?php echo $message;?>
    </div>
    
    <br><br>
    <p><a href='../index.php'>Go back</a></p>
    </form>
<?php include '../view/footer.php'?>