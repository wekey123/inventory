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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'adminhome';
		$this->Product->recursive = 1;
		$Products = $this->Product->find('all');
		//debug($Products);
		foreach($Products as $product) {
			
			foreach($product['Order'] as $Order) {
			 $product['Product']['order_qty'] += $Order['quantity'];
			 $product['Product']['order_purchase_price'] += $Order['purchase_price']*$Order['quantity'];
			 $product['Product']['order_sale_price'] += $Order['sale_price']*$Order['quantity'];
			}
			
			foreach($product['Fulfillment'] as $Fulfillment) {
			 $product['Product']['fulfill_qty'] += $Fulfillment['quantity'];
			 $product['Product']['fulfill_purchase_price'] += $Fulfillment['purchase_price']*$Fulfillment['quantity'];
			 $product['Product']['fulfill_sale_price'] += $Fulfillment['sale_price']*$Fulfillment['quantity'];
			}
			
			foreach($product['Sale'] as $Sale) {
			 $product['Product']['sale_qty'] += $Sale['quantity'];
			 $product['Product']['sale_purchase_price'] += $Sale['purchase_price']*$Sale['quantity'];
			 $product['Product']['sale_sale_price'] += $Sale['sale_price']*$Sale['quantity'];
			}
			$result[] = $product;
		}
		//debug($result);
		//exit;
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
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
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
