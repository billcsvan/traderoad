<?php include_once "../includes/head.php" ?>
<script src="support.js"></script>
<?php include_once "../includes/body.php" ?>

<h1 style="text-align: center;">
    Send us a message!</h1>
<form id="help">
    <div class="help-group">
        <label for="help-name">Name:</label>
        <input type="text" id="help-name" name="help-name">
    </div>
    <div class="help-group">
        <label for="help-email">Email</label>
        <input type="email" id="help-email" name="help-email">
    </div>
    <div class="help-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Send us a message..."></textarea>
    </div>


    <input type="submit" name="button" value="Send" id="helpSubmit">

</form>
<div id="message-container" style="display: none; text-align: center;">
    We will contact you asap
</div>
</section>
<?php include_once "../includes/footer.php" ?>
<?php include_once "../includes/iconbutton.php" ?>