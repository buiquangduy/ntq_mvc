  function xacnhanxoa(msg)
		{
			if(window.confirm(msg))
			{
				return true;
			}
			return false;
	}
	$(document).ready(function()
        {
                $('#add_form_product').submit(function(){
                    var product_name    = $.trim($('#txtName').val());
                    var active =  $.trim($('#txtActive').val());
                    var category =  $.trim($('#txtCategory').val());
                    var price =  $.trim($('#txtPrice').val());
                    //var file = $.trim($('#image').val());
                    var flag = true;
                    if (product_name == ''){
                        $('#username_error').text('please enter product name');
                        flag = false;
                    }
                    else
                    {
                        $('#username_error').text('');  
                    }
                    if (active == 0){
                        $('#active_error').text('please choose action');
                        flag = false;
                    }
                    else
                    {
                        $('#active_error').text('');    
                    }
                    if (category == 0){
                        $('#category_error').text('please choose category');
                        flag = false;
                    }
                    else
                    {
                        $('#category_error').text('');    
                    }
                    // if(file == ''){
                    //     $('#file_error').text('please choose image');
                    //     flag = false;
                    // }
                    // else
                    // {
                    //     $('#file_error').text('');    
                    // }
                    if(price == ''){
                        $('#price_error').text('please enter price');
                        flag = false;
                    }
                    else
                    {
                        $('#price_error').text('');    
                    }
                    return flag;
                    
                });
        });
	$(document).ready(function()
    {
                $('#add_category_form').submit(function(){
                    var cate_name    = $.trim($('#cate_name').val());
                    var active =  $.trim($('#txtActive').val());
                    var flag = true;
                    if (cate_name == ''){
                        $('#username_error').text('please enter name category');
                        flag = false;
                    }
                    else
                    {
                    	$('#username_error').text('');	
                    }
                    if (active == 0){
                        $('#active_error').text('please choose action');
                        flag = false;
                    }
                    else
                    {
                    	$('#active_error').text('');	
                    }
                    
                    return flag;
					
                });
    });
    $(document).ready(function() 
    {
        $('#login_err').delay(3000).slideUp();
    
    });