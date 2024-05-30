<form class="row" action="<?php echo "upload.php?postid=$postId"; ?>" method="post" enctype="multipart/form-data">
    <div class="col col-sm-10 col-md-10">
        <div class="form-group">
            <input type="text" name="comment" class="form-control rounded-0" id='comment' placeholder="Enter comment...">
            <input type="submit" name="preview" id="preview" value="Preview" action="<?php echo 'posts.php?postid=$postId'; ?>">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
    <div class="col col-sm-2 col-md-2">
        <input class="btn btn-warning rounded-0" type="submit" value="Submit" name="submit">
    </div>
</form>

<script>
    // Add event listener for the Preview button
    document.getElementById('preview').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the comment value
        let commentValue = document.getElementById('comment').value;

        console.log(commentValue);
    });
</script>