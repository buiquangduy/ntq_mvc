<div class="content">   
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-categories.html">List Categories</a> <span class="divider">></span></li>
            <li class="active">Add</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Categories Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="?ctr=Category&action=SaveCategory" method="post" id="add_category_form">
                        <input type="hidden" name="txtCate_id" value="<?=$category->cate_id?>"/>
                    	<div class="row-form">
                            <div class="span3">Category Name:</div>
                            <div class="span9"><input type="text" autofocus="true" value="<?php echo $category->name ?>" name="txtCateName" id="cate_name" autofocus="true" placeholder="some text value..."/></div>
                            <span id="username_error"></span>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="txtActive" id="txtActive">
                                    <option value="0">choose a option...</option>
                                    <option value="1" <?php echo ($category->active == 1)?"selected":""; ?>>Activate</option>
                                    <option value="2" <?php echo ($category->active == 2)?"selected":""; ?>>Deactivate</option>
                                </select>
                            </div>
                            <span id="active_error"></span>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Category Description:</div>
                            <div class="span9">
                            <input type="text" value="<?=$category->description ?>" name="txtDescription" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>                          
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit" name="add_category" >Create</button>
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