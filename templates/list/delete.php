<h2>Delete <?php echo f('controller.name') ?></h2>

<form method="post">

    <p>Are you sure?</p>

    <!-- <div class="command-bar"> -->
        <input type="submit" value="Yes" class="button round">
        <a href="javascript:history.back()" class="button round alert">No</a>
        <a href="<?php echo f('controller.url') ?>" class="button round">List</a>
    <!-- </div> -->

</form>