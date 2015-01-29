<?php

namespace App\Provider;

use Norm\Norm;

class AppProvider extends \Bono\Provider\Provider
{
    public function initialize()
    {
        $app = $this->app;

        $app->get('/', function () use ($app) {

	        /********** List **********/
	        $listModel = Norm::factory('List');
	        $listData = $listModel->find();
	        // $listData = $listModel->find()->sort(array('bulan' => 1, 'tanggal' => 1));
	        // $aircrafts = Norm::factory('List')->find()->group_by('tanggal');     
	        $dataList = array();
	        foreach ($listData as $key => $list) {
	            $dataList[] = $list->toArray();
	        }

	        /********** List **********/

	        $app->response->set('dataList', $dataList);
	        $app->response->template('list/index');
	    });
    }
}
