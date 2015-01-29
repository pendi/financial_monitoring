<?php

namespace App\Controller;

use \Norm\Controller\NormController;
use \URL;

/**
 * Base Controller
 */
class BaseController extends NormController
{
	public function create()
    {
        $entry = $this->collection->newInstance()->set($this->getCriteria());

        if ($this->request->isPost()) {
            try {
                $result = $entry->set($this->request->post())->save();

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
            }

            $this->redirect(URL::site('/'));

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
}
