<?php

return array(
    'bono.providers' => array(
        '\\Norm\\Provider\\NormProvider',
        '\\Xinix\\Migrate\\Provider\\MigrateProvider' => array(
            // 'token' => 'changetokenherebeforeenable',
        ),
        '\\App\\Provider\\AppProvider',
        // '\\App\\Provider\\LoginProvider',
        // '\\App\\Media\\Provider\\MediaProvider',
    ),
);
