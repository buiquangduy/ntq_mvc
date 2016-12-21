    <div class="loginBox">        
        <div class="loginHead">
            <img src="./app/assets/img/logo.png" alt="NTQ Solution Admin Control Panel" title="NTQ Solution Admin Control Panel"/>
        </div>
        <span id="login_err">
        	<?php
        		 if(isset($err))
        		 {
        		 	echo $err;
        		 } 
        		 else
        		 {
        		 	echo "";
        		 }
        	?>
        </span>
        <form class="form-horizontal" action="" method="POST">            
            <div class="control-group">
                <label for="inputUsername">Username</label>                
                <input type="text" id="txtUsername" name="txtUsername" />
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="txtPassword" name="txtPassword" />                
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox"> Remember me</label>                                                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>                
    </div>    
