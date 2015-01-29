<?php
use \App\Component\Form;
use \Norm\Schema\String;

$form = Form::create()->of($entry);
?>

<h2><?php echo preg_replace('/\B([A-Z])/', ' $1', f('controller.name')); ?></h2>

<form method="post" role="form">
    <p>
        <a href="<?php echo f('controller.url') ?>" class="button round">List</a>
        <a href="<?php echo f('controller.url', '/:id/update') ?>" class="button round">Update</a>
        <a href="<?php echo f('controller.url', '/:id/delete') ?>" class="button round alert">Delete</a>
    </p>

    <fieldset>
        <div class="row">
            <div class="span-12">
                <label>Note</label>
                <textarea readonly><?php echo $entry['keterangan'] ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="span-12">
                <label>Income</label>
                <input type="text" value="<?php echo $entry['pemasukan'] ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="span-12">
                <label>Expense</label>
                <input type="text" value="<?php echo $entry['pengeluaran'] ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="span-12">
                <label>Date</label>
                <input type="text" id="datepicker" size="15" value="<?php echo $entry['tanggal'] ?>" readonly>
            </div>
        </div>
    </fieldset>

</form>