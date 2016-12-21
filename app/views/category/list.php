<div class="content">    
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-categories.html">List Categories</a></li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12 search">
                <form action="?ctr=Category&action=SearchCategory" method="post">
                    <input type="text" class="span11" placeholder="Some text for search..." autofocus="true" name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Categories Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="?ctr=Category&action=AddNew" class="btn btn-add">Add Category</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="15%" class="sorting"><a href="#">ID</a></th>
                            <th width="25%" class="sorting"><a href="#">Category Name</a></th>
                            <th width="20%" class="sorting"><a href="#">Category Description</a></th>
                            <th width="10%" class="sorting"><a href="#">Activate</a></th>
                            <th width="15%" class="sorting"><a href="#">Time Created</a></th>
                            <th colspan="2" width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>  
                        <?php
                        if(count($category) > 0){
                            $i=1;
                            foreach ($category as $c) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox"/></td>
                            <td><?= $i++?></td>
                            <td><?= $c->name ?></td>
                            <td><?= $c->description ?></td>
                            <td>
                            	<?php 
                                    if($c->active==1)
                                    {
                                        echo "ACTIVE";
                                    }
                                    else
                                    {
                                        echo "DEACTIVE";
                                    }
                                ?>
                            </td>
                            <td><?= $c->created_at ?></td>
                            <td><a href="?ctr=Category&action=Update&id=<?= $c->cate_id ?>" class="btn btn-info">Edit</a></td>
                            <td><a onclick="return xacnhanxoa('Are you sure delete category?')" href="?ctr=Category&action=Remove&id=<?= $c->cate_id ?>" class="btn btn-info">Delete</a></td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <div class="bulk-action">
                        <a href="#" class="btn btn-success">Activate</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div><!-- /bulk-action-->
                    <div class="dataTables_paginate">
                        <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                        <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                        <a class="next paginate_button" href="#">Next</a>
                        <a class="last paginate_button" href="#">Last</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>
	</div>

</div>