<div class="content">    
    <div class="breadLine">
        <ul class="breadcrumb">
            <li><a href="list-products.html">List Products</a> <span class="divider">></span></li>
            <li class="active">Add</li>
        </ul>
    </div>
    <div class="workplace">
        <div class="row-fluid">
            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Products Management</h1>
                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form action="?ctr=Product&action=SaveProduct" method="post" enctype="multipart/form-data" id="add_form_product" >
                      <input type="hidden" name="txtProduct_id" value="<?php echo $product->id ?>" />
                      <div class="row-form">
                            <div class="span3">Product Name:</div>
                            <div class="span9"><input type="text" autofocus="true" value="<?php echo $product->name ?>" name="txtName" id="txtName" placeholder="some text value..."/></div>
                            <span id="username_error"></span>
                            <div class="clear"></div>
                        </div> 
                      <div class="row-form">
                            <div class="span3">Price:</div>
                            <div class="span9"><input type="text" value="<?php echo $product->price ?>" name="txtPrice" id="txtPrice" placeholder="some text value..."/></div>
                            <span id="price_error"></span>
                            <div class="clear"></div>
                        </div> 
                      <div class="row-form">
                            <div class="span3">Description:</div>
                            <div class="span9"><textarea name="txtDescription"  id="txtDescription" placeholder="Textarea field placeholder...">
                                <?php echo $product->description ?>
                            </textarea></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Content:</div>
                            <div class="span9"><textarea name="txtContent" id="txtContent" placeholder="Textarea field placeholder...">
                                <?php echo $product->content ?>
                            </textarea></div>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Upload Image:</div>
                            <div class="span9">
                                <img src="./app/assets/img/product/<?php echo $product->image ?>" alt="" /><br>
                                <input type="file" accept="image/gif, image/jpg, image/jpeg, image/png" name="pro_image" id="image"/>
                            </div>
                            <input type="hidden" name="img_change" value="<?php echo $product->image ?>">
                            <span id="file_error"></span>
                            <div class="clear"></div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="txtActive" id="txtActive">
                                    <option value="0">choose a option...</option>
                                    <option value="1" <?php echo ($product->active == 1)?"selected":""; ?>>Activate</option>
                                    <option value="2" <?php echo ($product->active == 2)?"selected":""; ?>>Deactivate</option>
                                </select>
                            </div>
                            <span id="active_error"></span>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Category:</div>
                            <div class="span9">
                               <select name="txtCategory" id="txtCategory">
                                              <?php
                                                if($categories){
                                                  foreach ($categories as $key => $value) {
                                                    $selected = $value->cate_id == $product->cate_id ? "selected" : null;
                                                    ?>
                                                      <option <?=$selected?> value="<?=$value->cate_id?>"><?=$value->name?></option>
                                                    <?php
                                                  }
                                                }
                                                ?>
                                </select>
                            </div>
                            <span id="category_error"></span>
                            <div class="clear"></div>
                        </div>                          
                        <div class="row-form">
                          <button class="btn btn-success" type="submit" name="add_product">Create</button>
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
   <!-- js validate form -->
<!--     <script type="text/javascript">
        $(document).ready(function(){
          $("#myform").validate({
            rules:{
              txtName:{
                required:true,
                minlength:4,
                maxlength:10
              },
              txtPrice:{
                required:true,
                minlength:5,
                maxlength:1000
              }
            },
            messages:{
              txtName:{
                required:"please enter name product",
                minlength:"Độ dài phải lớn hơn 5",
                maxlength:"Độ dài phải nhỏ hơn 10"
              },
              txtPrice:{
                minlength:"giá phải lớn hơn 5",
                maxlength:"giá phải nhỏ hơn 10"
              }
              
            }
          });
        });
    </script> -->