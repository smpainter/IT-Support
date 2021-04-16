<?php include '../view/header.php';?>

        <script>
                "use strict";
                
		var validate = function(event){
                    
                    var username = $('#username').val();
                    var password = $('#password').val();
                    
                    var result = true;
                    
                    
                    console.log($("#message").html());
                    $("#message").html("");
                    console.log($("#message").html());
                    
                    
                    if (username === "" || username.length < 2)
                            {
                            $("#message").html("<div class='alert alert-danger'>You must provide a user name.</div>");
                            event.preventDefault();
                            result = false;
                            }
                    if (password === "" || password.length < 2)
                            {
                            $("#message").html("<div class='alert alert-danger'>You must provide a password.</div>");
                            event.preventDefault();
                            result = false;
                            }
                    return result;
		};
		
                //tell the browser what to do when the form gets loaded
                
                $(document).ready(function(){
                    $('#loginform').submit(function(event){
                        validate(event);
                    });
                    
                    $('#go_button').click(function(){
                        $('#loginform').submit();
                    });
                });
	</script>
        <h1><i><?php echo $headertype;?></i></h1><br><br>
        <form id="loginform" action="index.php?type=<?php echo $type;?>" method="post">

            <div id="data">
                <label for="username">User name:</label>
                <input type="text" name="username" id="username"><br>
                <label for="username">Password:</label>
                <input type="password" name="password" id="password"><br>
            </div>

            <div id="buttons">
                <div class="label">&nbsp;</div>
                <input type="hidden" name="go_button">
                <a href="#" id="go_button" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Sign In</a><br><br>
            </div>

            <div id="message"><?php echo $message;?></div>

            <br><br>
            <div><a href='../index.php'>Go back</a></div>
            <br>
        </form>

<?php include '../view/footer.php';?>
