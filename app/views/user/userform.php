<div class="content">   
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-users.html">List Users</a> <span class="divider">></span></li>
            <li class="active">Add</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="?ctr=User&action=SaveUser&id=<?=$users->user_id ?>" method="post">
                        <input type="hidden" name="txt_user_id" value="<?php echo $users->user_id ?>" />
                    	<div class="row-form">
                            <div class="span3">Username:</div>
                            <div class="span9"><input type="text" name="txt_user_name" id="user_name" value="<?php echo $users->user_name ?>" autofocus="true" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" name="txt_user_email" value="<?php echo $users->email ?>" id="user_email" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div> 
                    	<div class="row-form">
                            <div class="span3">Password:</div>
                            <div class="span9"><input type="Password" name="txt_user_password" value="<?php echo $users->password ?>" id="user_password" placeholder="some text value..."/></div>
                            <div class="clear"></div>  
                        </div>
                        <div class="row-form">
                            <div class="span3">RePassword:</div>
                            <div class="span9"><input type="Password" id="user_repassword" placeholder="some text value..."/></div>
                            <div class="clear"></div>  
                        </div>
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="txt_user_active" id="user_active">
                                    <option value="0">choose a option...</option>
                                    <option value="1" <?php echo ($users->active == 1)?"selected":""; ?>>Activate</option>
                                    <option value="2" <?php echo ($users->active == 2)?"selected":""; ?>>Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                         <div class="row-group">
                                <div style="padding-left:20px; ">User Level</div>
                                <label class="radio-inline span9">
                                    <input name="txt_user_level" value="1" <?php echo ($users->level == 1)?"checked":""; ?> type="radio">Admin
                                </label>
                                <label class="radio-inline span9">
                                    <input name="txt_user_level" value="2" <?php echo ($users->level == 2)?"checked":""; ?> type="radio">Member
                                </label>
                            <div class="clear"></div>
                        </div>                           
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit">Create</button>
							<div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>