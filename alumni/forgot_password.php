<?php session_start() ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<div class="container-fluid card-body card text-aling">
    <form action="" id="update_password_form">
        <div class="form-group">
            <div class="col-md-6">
                <label for="" class="control-label">Email</label>
                <input type="email" name="username" required="" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label for="" class="control-label">New Password</label>
                <input type="password" name="new_password" required="" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label for="" class="control-label">Confirm Password</label>
                <input type="password" name="con_password" required="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
    $('#update_password_form').submit(function(e){
        e.preventDefault();
        $('#update_password_form button[type="submit"]').attr('disabled', true).html('Please Wait...');

        $.ajax({
            url: 'update_pass.php',
            method: 'POST',
            data: $(this).serialize(),
            error: function(err) {
                console.log(err);
                $('#update_password_form button[type="submit"]').removeAttr('disabled').html('Update');
            },
            success: function(resp) {
                if(resp == 1){
                    alert('Password changed successfully.');
                    window.location = 'index.php';
                } else {
                    alert(resp);
                    $('#update_password_form button[type="submit"]').removeAttr('disabled').html('Update');
                }
            }
        });
    });
});

</script>
