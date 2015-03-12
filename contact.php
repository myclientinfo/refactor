<?php
include_once 'header.php';
include_once 'config.php';

?>

    <h2>Contact Us</h2>

<div class="row">


    <div class="col-lg-6">
<?php
if(isset($_POST['email'])) { ?>
    <h3>Thank you for your message</h3>

    <p>Someone will contact you back shortly</p>

<?php } else { ?>

    <div class="panel">
        <form class="form-horizontal" id="search_form" method="post">
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="your name....">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="email address....">
                </div>
            </div>

            <div class="form-group">
                <label for="message" class="col-lg-2 control-label">Message</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="message" name="message"></textarea>
                    <span class="help-block">Please enter a short message</span>
                </div>
            </div>


            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>

        </form>
    </div>
<?php
}
?>
    </div>
    <div class="col-lg-6">

        <h3>Or use these details</h3>

        <div class="form-group">
            <label for="message" class="col-lg-2 control-label">Phone</label>
            <div class="col-lg-10">07 1234 55765
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <label for="message" class="col-lg-2 control-label">Address</label>
            <div class="col-lg-10">123 Fake Street<br>Falsonia
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <label for="message" class="col-lg-2 control-label">PO Box</label>
            <div class="col-lg-10">PO Box 123<br>Falsonia<br>123876
            </div>
        </div>

    </div>
</div>
<?php
include_once 'footer.php';
?>