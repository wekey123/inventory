<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');
	public $layout = 'admin';
	public $uses = array('Product','Invetory','Variant');
/**
 * index method
 *
 * @return void
 */
	
	public function index() {
				
		$this->layout = 'adminhome';
		$this->Product->recursive = 1;
		$Products = $this->Product->find('all');	
		foreach($Products as $product) {
			foreach($product['Invetory'] as $Invetory) {
			 if($Invetory['type'] == 'order'){
				 $product['Product']['order_qty'] += $Invetory['quantity'];
				 $product['Product']['order_purchase_price'] += $Invetory['purchase_price']*$Invetory['quantity'];
				 $product['Product']['order_sale_price'] += $Invetory['sale_price']*$Invetory['quantity'];
			 }
			 if($Invetory['type'] == 'fulfillment'){
				 $product['Product']['fulfill_qty'] += $Invetory['quantity'];
				 $product['Product']['fulfill_purchase_price'] += $Invetory['purchase_price']*$Invetory['quantity'];
				 $product['Product']['fulfill_sale_price'] += $Invetory['sale_price']*$Invetory['quantity'];
			 }
			 if($Invetory['type'] == 'sale'){
				 $product['Product']['sale_qty'] += $Invetory['quantity'];
				 $product['Product']['sale_purchase_price'] += $Invetory['purchase_price']*$Invetory['quantity'];
				 $product['Product']['sale_sale_price'] += $Invetory['sale_price']*$Invetory['quantity'];
			 }
			}
			$result[] = $product;
		}
		$this->set('products',$result);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'admin';
		
		//exit;
		
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$prod  = $this->Product->find('first', $options); 
		debug($prod); 
		exit;
		$this->set('product', $this->Product->find('first', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		$users = $this->Product->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$users = $this->Product->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Flash->success(__('The product has been deleted.'));
		} else {
			$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
