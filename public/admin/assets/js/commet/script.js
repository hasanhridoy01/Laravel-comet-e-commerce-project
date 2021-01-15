(function($){
    $(document).ready(function(){

        //datatable change
        $('table#dataTable').DataTable();
        $('table#dataTabletwo').DataTable();
        
        //Ck editor
        CKEDITOR.replace('post_editor');
        CKEDITOR.replace('post_editor_edit');

        // Logout system
        $('a#logout-button').click(function(e){
            e.preventDefault();
            $('form#logout-form').submit();
        });


        // Category edit
        $(document).on('click', 'a#category_edit', function(e){
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url : 'post-category-edit/' + id ,
                dataType : "json",
                success : function(data){
                    $('#category_modal_update form input[name="name"]').val(data.name);
                    $('#category_modal_update form input[name="id"]').val(data.id);
                }
            });


        });

        //file image show
        $('#fimage').change(function(e){
            e.preventDefault();

            let file_url =  URL.createObjectURL(e.target.files[0]);
            $('img#photo_show').attr('src', file_url)

        });

         //file image show
        $('#uploadimg').change(function(e){
            e.preventDefault();

            let file_url =  URL.createObjectURL(e.target.files[0]);
            $('img#post_featured_img').attr('src', file_url)

        });

        //product file img change
        $(document).on('change','#image', function(e){
            e.preventDefault();
            let file_img_url = URL.createObjectURL(e.target.files[0]);
            $('img#photo_show_product').attr('src', file_img_url);
        });

        //client img change
        $(document).on('change','#cimage', function(e){
            e.preventDefault();
            let file_img_url = URL.createObjectURL(e.target.files[0]);
            $('#client_image').attr('src', file_img_url);
        });

        //logo img change
        $(document).on('change','#limage', function(e){
            e.preventDefault();
            let file_img_url = URL.createObjectURL(e.target.files[0]);
            $('#logo_image').attr('src', file_img_url);
        });

        //slider img change
        $(document).on('change','#Svideo', function(e){
            e.preventDefault();
            let file_slider_url = URL.createObjectURL(e.target.files[0]);
            $('#slider_image').attr('src', file_slider_url);
        });

        //product update form
        $(document).on('change','#upmage', function(e){
            e.preventDefault();

            let file_upload_url = URL.createObjectURL(e.target.files[0]);
            $('#photo_update_product').attr('src', file_upload_url);
        });

        //tag edit
        $(document).on('click', '#tag_edit', function(e){
            e.preventDefault()
            
            //id recive
            let id = $(this).attr('edit_id');
            
            //ajax requirest
            $.ajax({
                url : 'tag-edit/' + id,
                dataType : "json",
                success : function(data){
                    $('form#tag_edit_form input[name="name"]').val(data.name);
                    $('form#tag_edit_form input[name="id"]').val(data.id);
                }
            });

        });

        //post edit modal show
        $(document).on('click','a#post_edit', function(e){
            e.preventDefault();
            $('#post_modal_update').modal('show');
        });

        //post edit
        $(document).on('click','#post_edit', function(e){
            e.preventDefault();

            //get id
            let id = $(this).attr('post_id');

            //ajax requirest
            $.ajax({
                url : 'post-edit/' + id,
                dataType : "json",
                success : function(data){
                    $('form#post_edit_form input[name="title"]').val(data.title);
                    $('form#post_edit_form input[name="id"]').val(data.id);
                    $('form#post_edit_form textarea').text(data.content);
                    $('#post_modal_update .cl').html(data.cat_list);
                    $('#post_modal_update .tg').html(data.tag_list);
                    $('form#post_edit_form input[name="old photo"]').val(data.featured_image);
                    $('form#post_edit_form img').attr('src', 'media/posts/' +  data.featured_image);
                }
            });
        });

        //Product Update 
        $(document).on('click','a#product_edit', function(e){
            e.preventDefault();

            //get id
            let product_id = $(this).attr('product_id');

            //ajax requiest
            $.ajax({
                url : 'product-edit/' + product_id,
                dataType : "json",
                success : function(data){
                    $('form#product_update_form input[name="name"]').val(data.name);
                    $('form#product_update_form input[name="id"]').val(data.id);
                    $('form#product_update_form .cl').html(data.cat_list);
                    $('form#product_update_form .tg').html(data.tag_list);
                    $('form#product_update_form input[name="brand"]').val(data.brand);
                    $('form#product_update_form input[name="price"]').val(data.price);
                    $('form#product_update_form input[name="name"]').val(data.name);
                    $('form#product_update_form img').attr('src', 'media/products/' + data.image);
                    //modal show
                    $('#tag_modal_update').modal('show');
                }
            });
        });

        //slider section script
        $(document).on('click','#comet_add_slide', function(e){
            e.preventDefault();

            let rand = Math.floor(Math.random() * 10000);

            $('.comet-slider-container').append('<div id="slider-card-'+ rand +'" class="card">' + '<div data-toggle="collapse" data-target="#Slide-'+ rand +'" style="cursor: pointer;" class="card-header"><h4>#Slide'+ rand +'<button id="comet_slider_remove" remove_id="Slide-'+ rand +'" class="close">&times;</button></h4></div>' + '<div id="Slide-'+ rand +'" class="collapse">' + '<div class="card-body">' + '<div class="form-group">' + '<label for="">Sub Title</label>' + '<input type="text" name="subtitle[]" class="form-control" placeholder="Sub Title">' + '<input type="hidden" name="slide_code[]" value="'+ rand +'" class="form-control"' + '</div>' + '<br>' + '<div class="form-group">' + '<label for="">Main Title</label>' + '<input type="text" name="title[]" class="form-control" placeholder="Main Title">' + '</div>' + '<div class="form-group">' + '<label for="">Button 01 Title</label>' + '<input type="text" name="btn1_title[]" class="form-control">' + '</div>' + '<div class="form-group">' + '<label for="">Button 01 Link</label>' + '<input type="text" name="btn1_link[]" class="form-control">' + '</div>' + '<div class="form-group">' + '<label for="">Button 02 Title</label>' + '<input type="text" name="btn2_title[]" class="form-control">' + '</div>' + '<div class="form-group">' + '<label for="">Button 02 Link</label>' + '<input type="text" name="btn2_link[]" class="form-control">' + '</div>' + '</div>' + '</div>' + '</div>');
            return false;
        });

        //slider remove
         $(document).on('click','#comet_slider_remove', function(e){
            e.preventDefault();

            let remove_code = $(this).attr('remove_id');
            $('#slider-card-'+ remove_code ).remove();
            
            return false;
        });


    });
})(jQuery)
