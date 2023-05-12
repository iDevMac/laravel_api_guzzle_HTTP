$(document).ready(function(){


    $('#app').DataTable();

    $('.nav_item').removeClass('Active');
    $('.nav_link').removeClass('Active');

    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(current_password);

        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:   'post',
            url:    '/admin/check-current-password',
            data:   {current_password:current_password},

            success: function(response){
                // alert(response)
                if(response=="false"){
                    $("#check_password").html('<p style="margin-top:10px; margin-left:30px; color:red;"> Error: The password you provided is not correct. Try again!</p>');
                    // $("#check_password").trigger('reset');
                }else if(response=="true"){
                    $("#check_password").html('<p style="margin-top:10px; margin-left:30px; color:green;"> Yes! Correct Password! </p>');
                }
            },
            error: function(){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                  footer: '<a href="#">Why do I have this issue?</a>'
                });
            },
        });
    });


        // Update section status
  $(document).on("click", ".updateSectionStatus", function() {
       var status = $(this).children("i").attr("status");
       var section_id= $(this).attr('section_id');
       // alert(status);
        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-section-status',
        data: {status:status,section_id:section_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href="#">Why do I have this issue?</a>'
           });
       }
  });
 });//Document ends)


// Update Filter Values status
  $(document).on("click", ".updateFilterStatus", function() {
       var status = $(this).children("i").attr("status");
       var filter_id= $(this).attr('filter_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-filter-status',
        data: {status:status,filter_id:filter_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#filter-"+filter_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#filter-"+filter_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)

  // Update Filter Values status
  $(document).on("click", ".updateValueStatus", function() {
       var status = $(this).children("i").attr("status");
       var value_id= $(this).attr('value_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-value-status',
        data: {status:status,value_id:value_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#value-"+value_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#value-"+value_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)

  

// Update category status updateAttributeStatus
  $(document).on("click", ".updateBannerStatus", function() {
       var status = $(this).children("i").attr("status");
       var banner_id= $(this).attr('banner_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-banner-status',
        data: {status:status,banner_id:banner_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#banner-"+banner_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#banner-"+banner_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)

 // Update category status updateAttributeStatus
  $(document).on("click", ".updateCategoryStatus", function() {
       var status = $(this).children("i").attr("status");
       var category_id= $(this).attr('category_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-category-status',
        data: {status:status,category_id:category_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)

    // Update Brand status
  $(document).on("click", ".updateBrandStatus", function() {
       var status = $(this).children("i").attr("status");
       var brand_id= $(this).attr('brand_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-brand-status',
        data: {status:status,brand_id:brand_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)


      // Update Product status
  $(document).on("click", ".updateProductStatus", function() {
       var status = $(this).children("i").attr("status");
       var product_id= $(this).attr('product_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-product-status',
        data: {status:status,product_id:product_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#product-"+product_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#product-"+product_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
            alert('Error!!');
       }
  });
 });//Document ends)

  // Update Attribute status
  $(document).on("click", ".updateAttributeStatus", function() {
       var status = $(this).children("i").attr("status");
       var attribute_id= $(this).attr('attribute_id');
       // alert(status);

        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-attribute-status',
        data: {status:status,attribute_id:attribute_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#attribute-"+attribute_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#attribute-"+attribute_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {0
            alert('Error!!');
       }
  });
 });//Document ends)


  // Update Image status
  $(document).on("click", ".updateImageStatus", function() {
       var status = $(this).children("i").attr("status");
       var image_id= $(this).attr("image_id");
       // alert(status);
        $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/admin/update-image-status',
        data: {status:status,image_id:image_id},

        success: function(resp) {
            if (resp['status']==0) {
                $("#image-"+image_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
            }
             else if(resp['status']==1) {
                $("#image-"+image_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
            }
        },   
        error: function() {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href="#">Why do I have this issue?</a>'
           });
       }
    });
 });//Document ends)



    // Confirm to delete section Simple JS
    // $(".confirm_delete").on("click", function() {
    //     title = $(this).attr("title");
    //     if (confirm("Are you sure you want to delete this "+title+"?")) {
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // });


      // Confirm Category Delete
    $(document).on("click", ".confirmDelete", function() {

        var moduleS = $(this).attr("module");
        var moduleId = $(this).attr("moduleId");

          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                window.location = "/admin/delete-"+moduleS+"/"+moduleId;
              }
            });
       }); // End of confirm_delete



       // Confirm IMage
    $(".view").on("click", function() {
        var moduleS = $(this).attr("module");
        var moduleId = $(this).attr("moduleId");

          Swal.fire({
              title: '',
              text: "Category Image",
              imageUrl:"front/img/category/31670.jpg",
              imageWidth: 400,
              imageHeight:300,
              imageAlt: 'Category Image',
            });

       }); // End of confirm_delete


    $('#section_id').change(function(){
        var section_id = $(this).val();
        // alert(section_id);
      $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'get',
        url:  '/admin/append-category-level',
        data: {section_id:section_id},

        success: function(resp){
          $('#appendCategoryLevel').html(resp);
        },
        error: function(){
          alert('error');
        },

      });
    });

      //Add remove Product Attribute fields dynamically
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div style="height:10px;"></div><input type="text" name="size[]" style="width: 100px;" placeholder="Size" />&nbsp;<input type="text" name="sku[]" style="width: 100px;" placeholder="Sku"/>&nbsp;<input type="text" name="price[]" style="width: 100px;" placeholder="Price"/>&nbsp;<input type="text" name="stock[]" style="width: 100px;" placeholder="Stock"/><a href="javascript:void(0);" class="remove_button"><i style="color:red; font-size: 20px" class="mdi mdi-close-box-outline"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });


    $('#category_id').on("change", function(){
      var category_id = $(this).val();
      // alert(category_id);

      $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type : 'post',
        url : 'category-filters',
        data : {category_id:category_id},

        success : function(resp){
          $('.loadFilters').html(resp.view);
        },
      });

    });

});

        