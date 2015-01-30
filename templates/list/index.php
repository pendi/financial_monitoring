<section id="body">
    <div>
        <h2 style="font-family: initial;">Welcome to the Financial Monitoring Applications. This application is useful for your financial records.</h2>
        <?php if (!empty($dataList)): ?>
            <?php //foreach ($dataList as $val): ?>
            <span class="show_2014"><H2 id="show">2015</H2></span><span class="hide_2014"><H2 id="show">2015</H2></span>
            <?php //endforeach ?>
        <?php endif ?>
            <div id="spoiler_2014">
                <div class="table-container">
                    <table class="table nowrap stripped hover" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th width="45%">Note</th>
                                <th width="15%">Income</th>
                                <th width="15%">Expense</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total_d = ""; $total_k = ""; $total_j = ""; ?>
                        <?php if (!empty($dataList)): ?>
                            <?php foreach ($dataList as $val): ?>
                                <tr>
                                    <td align="center"><?php echo $val['tanggal']; ?></td>
                                    <td><?php echo $val['keterangan']; ?></td>
                                    <td align="right">Rp <?php echo number_format($val['pemasukan'],0,'','.').",-"; ?></td>
                                    <td align="right">Rp <?php echo number_format($val['pengeluaran'],0,'','.').",-"; ?></td>
                                    <td align="center">
                                        <a style="color:#4043C3" href="<?php echo URL::site('/list/'.$val['$id'].'/update') ?>">Edit</a> &nbsp;
                                        <a style="color:#4043C3" href="<?php echo URL::site('/list/'.$val['$id'].'/delete') ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php 
                                $total_d+=$val['pemasukan'];
                                $total_k+=$val['pengeluaran'];
                                $total_j = $total_d - $total_k;
                            ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if (!empty($dataList)): ?> 
                            <tr>
                                <th colspan="2">Total</th>
                                <th>Rp <?php echo number_format($total_d,0,'','.').",-"; ?></th>
                                <th>Rp <?php echo number_format($total_k,0,'','.').",-"; ?></th>
                                <th>Rp <?php echo number_format($total_j,0,'','.').",-"; ?></th>
                            </tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</section>
<script type="text/javascript">
    $(".hide_2014").hide();
    $("#spoiler_2014").hide();
    $(".hide_2014").click(function(){
        $("#spoiler_2014").slideUp();
        $(".hide_2014").hide();
        $(".show_2014").show();
    });
    $(".show_2014").click(function(){
        $("#spoiler_2014").slideDown();
        $(".hide_2014").show();
        $(".show_2014").hide();
    });
</script>
