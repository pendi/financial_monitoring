<div>
    <form method="post" onsubmit="return validasi(this)">
        <fieldset>
            <div class="row">
                <div class="span-12">
                    <label>Note</label>
                    <textarea placeholder="Note" name="keterangan" autofocus></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span-12">
                    <label>Income</label>
                    <input type="text" placeholder="Income" name="pemasukan">
                </div>
            </div>
            <div class="row">
                <div class="span-12">
                    <label>Expense</label>
                    <input type="text" placeholder="Expense" name="pengeluaran">
                </div>
            </div>
            <div class="row">
                <div class="span-12">
                    <label>Date</label>
                    <input type="text" placeholder="Date" name="tanggal" id="datepicker" size="15">
                </div>
            </div>
        </fieldset>
            
        <input type="submit" value="Save" class="button round">
        <a href="<?php echo URL::site('/') ?>" class="button round alert" style="z-index:0">List</a>
    </form> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#datepicker").datepicker({
            dateFormat : "dd/mm/yy",
            // changeMonth : true,
            // changeYear : true
        });
    });
    
    // $(function() {
    //     $( "#datepicker" ).datepicker();
    // });

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