<?php
App::uses('AppController', 'Controller');
/**
 * Invetories Controller
 *
 * @property Invetory $Invetory
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class InvetoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Invetory->recursive = 0;
		$this->set('invetories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invetory->exists($id)) {
			throw new NotFoundException(__('Invalid invetory'));
		}
		$options = array('conditions' => array('Invetory.' . $this->Invetory->primaryKey => $id));
		$this->set('invetory', $this->Invetory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invetory->create();
			if ($this->Invetory->save($this->request->data)) {
				$this->Flash->success(__('The invetory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The invetory could not be saved. Please, try again.'));
			}
		}
		$users = $this->Invetory->User->find('list');
		$products = $this->Invetory->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invetory->exists($id)) {
			throw new NotFoundException(__('Invalid invetory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invetory->save($this->request->data)) {
				$this->Flash->success(__('The invetory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The invetory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invetory.' . $this->Invetory->primaryKey => $id));
			$this->request->data = $this->Invetory->find('first', $options);
		}
		$users = $this->Invetory->User->find('list');
		$products = $this->Invetory->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invetory->id = $id;
		if (!$this->Invetory->exists()) {
			throw new NotFoundException(__('Invalid invetory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Invetory->delete()) {
			$this->Flash->success(__('The invetory has been deleted.'));
		} else {
			$this->Flash->error(__('The invetory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
