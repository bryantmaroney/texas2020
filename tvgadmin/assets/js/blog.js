jQuery(document).ready(function(){
    $(document).on('click', '.profileSlideDown', function(event) {
      $('.profile-slide-down').fadeToggle();
    });
    $(document).on('click', '.showPostDetails', function(){
       $('.postDetails').fadeIn(200);
    })
    $(document).on('click','.closeEdit',function(){
        $(this).parents('.postDetails').fadeOut(200);
    })
    var tableCurrentRow;
    $(document).on('click','.deleteBlogItem',function(){
        $('body, html').css('overflow', 'hidden');
        tableCurrentRow = $(this).parents('tr');
        $('.deletePostModal').show();  
        $('.deletePostModal').find('.deleteModal').addClass('animate__pulse');  
        $('.deletePostModal').find('.deleteModal').removeClass('animate__zoomOut');    
    })
    $(document).on('click','.closeDeleteModal, .cancelDeletePost',function(){
        $('body, html').css('overflow', 'initial');
        const _this = $(this);
        $(this).parents('.deletePostModal').find('.deleteModal').removeClass('animate__pulse');  
        $(this).parents('.deletePostModal').find('.deleteModal').addClass('animate__zoomOut'); 
        setTimeout(function(){
             _this.parents('.deletePostModal').fadeOut(200);
        },500)   
    })

    $(document).on('click','.confirmDeletePost',function(){

        var table = $('#blog_list').DataTable();
        table.row( tableCurrentRow ).remove().draw();

        $(this).parents('.deletePostModal').find('.closeDeleteModal').trigger('click');      
    })
    $(document).on('click','.addNewPost',function(){
        $('body, html').css('overflow', 'hidden');
        $('.createPostModal').fadeIn(200); 
    })
    $(document).on('click','.closeAddPost',function(){
        $('body, html').css('overflow', 'initial');
        $('.createPostModal').fadeOut(200); 
    })

	$(document).on('click','.editBlogItem',function(){
        $('body, html').css('overflow', 'hidden');
        $('.editPostModal').fadeIn(200); 
    })
    $(document).on('click','.closeEditPost',function(){
        $('body, html').css('overflow', 'initial');
        $('.editPostModal').fadeOut(200); 
    })


})



 