<?php

namespace App\Controller;

use \Norm\Controller\NormController;
use \URL;
use \Norm\Norm;

/**
 * Base Controller
 */
class ListController extends BaseController
{
	public function mapRoute()
    {
        $this->map('/null/create', 'create')->via('GET', 'POST');
        $this->map('/:id', 'read')->via('GET');
        $this->map('/:id/update', 'update')->via('GET', 'POST');
        $this->map('/:id/delete', 'delete')->via('GET', 'POST');

        $this->map('/', 'search')->via('GET');
        $this->map('/', 'create')->via('POST');

    }

    public function create()
    {
        $entry = $this->getCriteria();

        if ($this->request->isPost()) {

            $post = $this->request->post();
            echo "<pre>";

            $date = $post['tanggal'];
            $dateExplode = explode('/', $date);
            // var_dump($dateExplode[1]);
            // exit();

            try {
                $entry = array_merge($entry, $post);
                $dataList = array(
                    'keterangan' => $entry['keterangan'],
                    'pemasukan' => $entry['pemasukan'],
                    'pengeluaran' => $entry['pengeluaran'],
                    'tanggal' => $dateExplode[1],
                    'bulan' => $dateExplode[0],
                    'tahun' => $dateExplode[2],
                );

                $newFile = Norm::factory('List')->newInstance();
                $newFile->set($dataList);
                $newFile->save();

                $entry = $newFile;

                h('notification.info', $this->clazz.' created.');

                h('controller.create.success', array(
                    'model' => $entry
                ));

            } catch (\Slim\Exception\Stop $e) {
                throw $e;
            } catch (\Exception $e) {

                h('notification.error', $e);

                h('controller.create.error', array(
                    'model' => $entry,
                    'error' => $e,
                ));

                // $this->flashNow('error', $e);
            }
            $this->redirect(URL::site('/'));
            // $this->redirect($this->getRedirectUri());
        }

        $this->data['entry'] = $entry;
    }

    public function delete($id)
    {
        $id = explode(',', $id);
        if ($this->request->isPost() || $this->request->isDelete()) {

            $single = false;
            if (count($id) === 1) {
                $single = true;
            }

            try {

                $this->data['entries'] = array();
                foreach ($id as $value) {
                    $model = $this->collection->findOne($value);

                    if (is_null($model)) {
                        if ($single) {
                            $this->app->notFound();
                        }
                        continue;
                    }

                    $model->remove();

                    $this->data['entries'][] = $model;
                }

                h('notification.info', $this->clazz.' deleted.');

                h('controller.delete.success', array(
                    'models' => $this->data['entries'],
                ));

            } catch (\Slim\Exception\Stop $e) {
                throw $e;
            } catch (\Exception $e) {
                h('notification.error', $e);

                if (empty($model)) {
                    $model = null;
                }

                h('controller.delete.error', array(
                    'error' => $e,
                    'model' => $model,
                ));
            }
            $this->redirect(URL::site('/'));
            // $this->redirect($this->getRedirectUri());
        }
    }

    public function update($id)
    {
        try {
            $entry = $this->collection->findOne($id);
        } catch (\Exception $e) {
        }

        if (is_null($entry)) {
            return $this->app->notFound();
        }

        if ($this->request->isPost() || $this->request->isPut()) {

            try {
                $merged = array_merge(
                    isset($entry) ? $entry->dump() : array(),
                    $this->request->post() ?: array()
                );
                $entry->set($merged)->save();

                h('notification.info', $this->clazz.' updated');

                h('controller.update.success', array(
                    'model' => $entry,
                ));
            } catch (\Slim\Exception\Stop $e) {
                throw $e;
            } catch (\Exception $e) {
                h('notification.error', $e);

                if (empty($entry)) {
                    $model = null;
                }

                h('controller.update.error', array(
                    'error' => $e,
                    'model' => $entry,
                ));
            }
            $this->redirect(URL::site('/'));
        }
        $this->data['entry'] = $entry;
    }

    public function price($price) 
    {
		$format = number_format($price,0,'','.').",-";
		// return $format;

		$this->data['self'] = $this;

		echo $self->price($format);
	}
}