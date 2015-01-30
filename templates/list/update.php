<?php
use \App\Component\Form;

$form = Form::create()->of($entry);
?>


<h2>Update <?php echo preg_replace('/\B([A-Z])/', ' $1', f('controller.name')); ?></h2>

<form method="post" onsubmit="return validasi(this)">
    <fieldset>
    	<div class="row">
    		<div class="span-12">
		        <label>Note</label>
		        <textarea placeholder="Note" name="keterangan" autofocus><?php echo @$entry['keterangan'] ?></textarea>
    		</div>
    	</div>
    	<div class="row">
    		<div class="span-12">
		        <label>Income</label>
		        <input type="text" name="pemasukan" placeholder="Income" value="<?php echo @$entry['pemasukan'] ?>">
    		</div>
    	</div>
    	<div class="row">
    		<div class="span-12">
		        <label>Expense</label>
		        <input type="text" name="pengeluaran" placeholder="Expense" value="<?php echo @$entry['pengeluaran'] ?>">
    		</div>
    	</div>
    	<div class="row">
    		<div class="span-12">
		        <label>Date</label>
		        <input type="text" id="datepicker" size="15" placeholder="Date" name="tanggal" value="<?php echo @$entry['tanggal'] ?>" />
    		</div>
    	</div>
    </fieldset>

    <input type="submit" value="Save" class="button round">
    <a href="<?php echo URL::site('/') ?>" class="button round alert" style="z-index:0">Back</a>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $("#datepicker").datepicker({
            dateFormat : "dd/mm/yy",
            // changeMonth : true,
            // changeYear : true
        });
    });

    function validasi(form) {
        if (form.keterangan.value == 0){
            alert("Keterangan belum diisi.");
            form.keterangan.focus();
            return (false);
        }
        if (form.tanggal.value == ""){
            alert("Tanggal belum dipilih.");
            form.tanggal.focus();
            return (false);
        }
        return (true);  
    }
</script>