(function($){
    $(document).ready(function(){

        //datatable change
        $('table#dataTable').DataTable();
        
        //Ck editor
        CKEDITOR.replace('post_editor');

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


    });
})(jQuery)
