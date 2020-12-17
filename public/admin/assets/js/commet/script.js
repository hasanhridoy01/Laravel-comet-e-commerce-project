(function($){
    $(document).ready(function(){

        //datatable change
        $('table#dataTable').DataTable();
        
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
            e.preventDefault()

            //get id
            let id = $(this).attr('post_id');

            //ajax requirest
            $.ajax({
                url : 'post-edit/' + id,
                dataType : "json",
                success : function(data){
                    $('form#post_edit_form input[name="title"]').val(data.title);
                    $('form#post_edit_form input[name="id"]').val(data.id);
                    $('form#post_edit_form textarea[name="content"]').val(data.content);
                    $('#post_modal_update .cl').html(data.cat_list);
                    $('form#post_edit_form input[name="fimg"]').val(data.featured_image);
                    $('form#post_edit_form img').attr('src', 'media/posts/' +  data.featured_image);
                }
            });
        });


    });
})(jQuery)
