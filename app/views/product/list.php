<div class="content">       
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-products.html">List Products</a></li>
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
                    <h1>Products Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="?ctr=Product&action=AddNew" class="btn btn-add">Add Product</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="10%" class="sorting"><a href="#">ID</a></th>
                            <th width="20%" class="sorting"><a href="#">Product Name</a></th>
                            <th width="15%" class="sorting"><a href="#">Price</a></th>
                            <th width="15%" class="sorting"><a href="#">Activate</a></th>
                            <th width="20%" class="sorting"><a href="#">Description</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                            <th colspan="2" width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($products) > 0){
                            $i=1;
                            foreach ($products as $p) {
                        ?>                
                        <tr>
                            <td><input type="checkbox" name="checkbox"/></td>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $p->name ?></td>
                            <td><?php echo number_format($p->price,0,",",".") ?></td>
                            <td>
                                 <?php 
                                    if($p->active==1)
                                    {
                                        echo "ACTIVE";
                                    }
                                    else
                                    {
                                        echo "DEACTIVE";
                                    }
                                ?>
                            </td>
                            <td><?php echo $p->description ?></td>
                            <td><?php echo $p->created_at ?></td>
                            <td><a href="?ctr=Product&action=Update&id=<?=$p->id?>" class="btn btn-info">Edit</a></td>
                            <td><a onclick="return xacnhanxoa('Are you sure delete product?')" href="?ctr=Product&action=Remove&id=<?=$p->id?>"  class="btn btn-info">Delete</a></td>
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