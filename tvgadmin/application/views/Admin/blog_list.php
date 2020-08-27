<?php $this->load->view('Admin/adminHeader'); ?>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
<script src="https://cdn.tiny.cloud/1/kkkxzpm8in34vxjfkc14aytfvc7k0hd4uqgleorl45xpxkm2/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
<script>
    tinymce.init({
        selector: '#mytextareaCreate',
        width: '100%',
        height: 400,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table paste code help wordcount'
		],
		toolbar: 'undo redo | formatselect | ' +
		'bold italic backcolor | alignleft aligncenter ' +
		'alignright alignjustify | bullist numlist outdent indent | ' +
		'removeformat | help',
		content_css: '//www.tiny.cloud/css/codepen.min.css',	
    });

	tinymce.init({
        selector: '#mytextareaEdit',
        width: '100%',
        height: 400,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table paste code help wordcount'
		],
		toolbar: 'undo redo | formatselect | ' +
		'bold italic backcolor | alignleft aligncenter ' +
		'alignright alignjustify | bullist numlist outdent indent | ' +
		'removeformat | help',
		content_css: '//www.tiny.cloud/css/codepen.min.css',
    });
</script>

<div class="postDetails">
  <div class="detailContainer">
    <img class="closeEdit" src="<?php echo base_url() ?>assets/images/blog-edit-close.png" alt="close edit">
    <div class="detailContent">
        <p class="psDet">POST DETAIL</p>
        <div class="postImg">
            <div class="imgTitle">
                <div>DS</div>
                <div>DAVID SMITH</div>
                <div>2h</div>
            </div>
           <img src="<?php echo base_url() ?>assets/images/postImg.png" alt="detail image" > 
        </div>
        <p class="postText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        <p class="postText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        <p class="postText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. viverra maecenas facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        <div class="postReactions">
            <div>CATEGORY 1</div>
            <div><img src="<?php echo base_url() ?>assets/images/postLike.png" alt="like" ><span>256</span></div>
            <div><img src="<?php echo base_url() ?>assets/images/postCom.png" alt="comment" ><span>1422</span></div>
        </div>
        <p class="r4ecentTitle">RECENT COMMENTS</p>
        <div class="postComment">
          <div><img src="<?php echo base_url() ?>assets/images/comImg.png" alt="user image" ></div>
          <div>
              <p>DAISY JONSON</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus pendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>
                  <span>Jun13,2020</span>
                  <span>Reply</span>
              </p> 
          </div>
        </div>
        <div class="postComment">
          <div><img src="<?php echo base_url() ?>assets/images/comImg.png" alt="user image" ></div>
          <div>
              <p>DAISY JONSON</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus pendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>
                  <span>Jun13,2020</span>
                  <span>Reply</span>
              </p> 
          </div>
        </div>
        <div class="postComment">
          <div><img src="<?php echo base_url() ?>assets/images/comImg.png" alt="user image" ></div>
          <div>
              <p>DAISY JONSON</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus pendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>
                  <span>Jun13,2020</span>
                  <span>Reply</span>
              </p> 
          </div>
        </div>
        <div class="postComment">
          <div><img src="<?php echo base_url() ?>assets/images/comImg.png" alt="user image" ></div>
          <div>
              <p>DAISY JONSON</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus pendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>
                  <span>Jun13,2020</span>
                  <span>Reply</span>
              </p> 
          </div>
        </div>
        <p class="r4ecentTitle">LEAVE A REPLAY</p>
        <p class="postText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
        <div class="leaveComment">
            <div>
                <input placeholder="Your Name">
                <input placeholder="Email Address">
            </div>
            <div>
                <textarea placeholder="Message"></textarea>
            </div>
            <div>
                <button>SUBMIT</button>
            </div>
        
        </div>
    </div>
  </div>
</div>

<div class="deletePostModal">
    <div class="deleteModal animate__animated">
        <img class="closeDeleteModal" src="<?php echo base_url() ?>assets/images/closeDeleteModal.png" alt="close delete modal" >
        <div class="deleteTop"><img src="<?php echo base_url() ?>assets/images/deletePostIcone.png" alt="delete icon" ></div>
        <div class="deleteBottom">
            <p class="areYouSure">Are you sure?</p>
            <p class="delText">You are about to permanently</p>
            <p class="delText">delete this blog post.</p>
            <div class="deleteConfCanc">
                <button class="confirmDeletePost">Confirm</button>
                <button class="cancelDeletePost">Cancel</button>
            </div>
        </div>        
    </div>
</div>

<div class="createPostModal">
  <div class="createPostContainer">
    <div class="closeAddPostContainer">
        <p>CREATE NEW POST</p>
        <img class="closeAddPost" src="<?php echo base_url() ?>assets/images/postCreateClose.png" img="close add post" >
    </div>
    <form method="post"> 
        <div class="createContent">
            <div>
                <input placeholder="Enter Blog Title">
            </div>
            <div>
                <input placeholder="Select Category">
                <div><img src="<?php echo base_url() ?>assets/images/blog-filter-arrow.png" alt="arrow"></div>
            </div>
            <div>
                <textarea id="mytextareaCreate" name="mytextarea">
                    Create new post...
                </textarea>
            </div>
            <div class="post">
                <button>POST</button>
            </div>
        </div>
    </form>
  </div>
</div>

<div class="editPostModal">
  <div class="editPostContainer">
    <div class="closeEditPostContainer">
        <p>EDIT POST</p>
        <img class="closeEditPost" src="<?php echo base_url() ?>assets/images/postCreateClose.png" alt="close edit post" >
    </div>
    <form method="post"> 
        <div class="editContent">
            <div>
                <input placeholder="Enter Blog Title" value="Lorem ipsum dolor">
            </div>
            <div>
                <input placeholder="Select Category" value="Lorem ipsum">
                <div><img src="<?php echo base_url() ?>assets/images/blog-filter-arrow.png" alt="arrow"></div>
            </div>
            <div>
                <textarea id="mytextareaEdit" name="mytextarea">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                </textarea>
            </div>
            <div class="edit">
                <button>UPDATE POST</button>
            </div>
        </div>
    </form>
  </div>
</div>



<div class="blog_list">
    <div class="blog_title">
    <p>BLOG LIST</p>
    <button class="addNewPost">ADD NEW</button>
    </div>
    <div class="search_and_counts">
    <div>
        <div>All (<span>10</span>)</div>
        <div>Published (<span>12</span>)</div>
        <div>Trash (<span>5</span>)</div>
    </div>
    <div>
        <input placeholder="Search...">
        <div><img src="<?php echo base_url() ?>assets/images/blog-search.png" alt="search"></div>
        <span class="blog-items-count">12 ITEMS</span>
    </div>
    </div>
    <div class="blog_filters">
        <div>
            <input placeholder="Bulk Action">
            <div><img src="<?php echo base_url() ?>assets/images/blog-filter-arrow.png" alt="arrow"></div>
        </div> 
        <div>
            <input placeholder="Filter by Date">
            <div><img src="<?php echo base_url() ?>assets/images/blog-filter-arrow.png" alt="arrow"></div>
        </div>
        <div>
            <input placeholder="Filter by Category">
            <div><img src="<?php echo base_url() ?>assets/images/blog-filter-arrow.png" alt="arrow"></div>
        </div>
        <button>FILTER</button>

    </div>

    <table id="blog_list" class="table table-striped dataTable nowrap tblStyles" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th>
                    <div class="check-container">
                        <input type="checkbox" id="all">
                        <label for="all"></label>
                    </div>
                    <span>TITLE</span>
                </th>
                <th>AUTHOR</th>
                <th>CATEGORIES</th>
                <th>DATE</th>
                <th><img src="<?php echo base_url() ?>assets/images/blog-com-icon.png" alt="comment"></th>
                <th>EDIT/REMOVE</th>
            </tr>
        </thead>
        <tbody>
			<?php for($i = 0; $i < 50; $i++) { ?>
				<tr>
					<td>
						<div class="check-container">
							<input type="checkbox" id="one<?php echo($i) ?>">
							<label for="one<?php echo($i) ?>"></label>
						</div>
						<span class="showPostDetails">Lorem Ipsum dolor</span>
					</td>
					<td>David smith</td>
					<td>Lorem Ipsum sit</td>
					<td>
						<p>Published</p>
						<p>13/06/2020</p>
					</td>
					<td>53</td>
					<td>
						<img class="editBlogItem" src="<?php echo base_url() ?>assets/images/blog-edit-icon.png" alt="edit">
						<img class="deleteBlogItem" src="<?php echo base_url() ?>assets/images/blog-delete-icon.png" alt="delete">
					</td>
				</tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
<script src="<?php echo base_url() ?>assets/js/blog.js"></script>
<script>
    var site_url = "<?php echo base_url() ?>";
    $('#blog_list').DataTable({
        pageLength : 7,
        "bLengthChange": false,
        bFilter: false,
        "ordering": false,
        scrollX: true,
        responsive: false,
        "columnDefs": [
            { "width": "20%", "targets": 0 }
        ],
        "language": {
            "paginate": {
                "previous": "<<",
                "next": ">>"
            },
            "info": "Showing _START_ - _END_ of _TOTAL_ items",
        },
        "dom": 'rt<"bottom"><"left"pi><"clear">',
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/myProfile.js"></script>
</html>