<?php

use Norm\Schema\String;
use Norm\Schema\Integer;
use Norm\Schema\Text;

return array(
    'schema' => array(
        'keterangan' => Text::create('note')->filter('trim'),
        'pemasukan' => Integer::create('income')->filter('trim'),
        'pengeluaran' => Integer::create('expense')->filter('trim'),
        'tanggal' => Text::create('date')->filter('trim'),
    )
);
