<div class="content">   
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-users.html">List Users</a></li>
        </ul>
    </div>
    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->

        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="?ctr=User&action=AddNew" class="btn btn-add">Add User</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="15%" class="sorting"><a href="#">ID</a></th>
                            <th width="20%" class="sorting"><a href="#">Username</a></th>       
                            <th width="20%" class="sorting"><a href="#">Email</a></th>
                            <th width="15%" class="sorting"><a href="#">Action</a></th>
                            <th width="10%" class="sorting"><a href="#">Level</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                            <th width="10%" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>    
                        <?php
                            if(count($users) > 0){
                            $i=1;
                            foreach ($users as $u) {
                        ?>  
                        <tr>
                            <td><input type="checkbox" name="checkbox"/></td>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $u->user_name ?></td>
                            <td><?php echo $u->email ?></td>
                            <td>
                                <?php 
                                    echo $u->active==1?"ACTIVE":"DEACTIVE";
                                ?>
                            </td>
                            <td> 
                                <?php 
                                    if($u->user_id==2 && $u->level==1)
                                    {
                                        echo "Superadmin";
                                    }
                                    elseif($u->level==1)
                                    {
                                        echo "Admin";
                                    }
                                    else
                                    {
                                        echo "Member";
                                    }
                                ?>
                            </td>
                            <td><?php echo $u->created_at ?></td>
                            <td><a href="?ctr=User&action=Update&id=<?=$u->user_id?>" class="btn btn-info">Edit</a></td>
                            <td><a onclick="return xacnhanxoa('Are you sure delete user?')" href="?ctr=User&action=Remove&id=<?=$u->user_id?>" class="btn btn-info">Delete</a></td>
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