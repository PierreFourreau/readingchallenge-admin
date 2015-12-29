<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
* Categories Controller
*
* @property \App\Model\Table\CategoriesTable $Categories
*/
class CategoriesController extends AppController
{

  /**
  * Index method
  *
  * @return void
  */
  public function index()
  {
    $this->set('niveaux', Configure::read('niveaux'));
    if(!isset($this->request->data) || !isset($this->request->data['niveau'])) {
      $niveau = 1;
    }
    else {
      $niveau = $this->request->data['niveau'];
    }
      $this->set('categories', $this->Categories->find('all')->where(['niveau' => $niveau]));
    $this->set('_serialize', ['categories']);
  }

  /**
  * View method
  *
  * @param string|null $id Category id.
  * @return void
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function view($id = null)
  {
    $category = $this->Categories->get($id, [
      'contain' => ['Suggestions']
    ]);
    $this->set('niveaux', Configure::read('niveaux'));
    $this->set('category', $category);
    $this->set('_serialize', ['category']);
  }

  /**
  * Add method
  *
  * @return void Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $category = $this->Categories->newEntity();
    if ($this->request->is('post')) {
      $file = $this->request->data['image'];
      $category = $this->Categories->patchEntity($category, $this->request->data);
      $category['image'] = $file['name'];
      if ($this->Categories->save($category)) {
        if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' . DS . $file['name']) == false) {
          $this->Flash->error(__('Image upload error.'));
        }
        $this->Flash->success(__('The category has been saved.'));
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The category could not be saved. Please, try again.'));
      }
    }
    $this->set('niveaux', Configure::read('niveaux'));
    $this->set(compact('category'));
    $this->set('_serialize', ['category']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Category id.
  * @return void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $category = $this->Categories->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $file = $this->request->data['image'];
      $category = $this->Categories->patchEntity($category, $this->request->data);
      if(isset($file['name']) && $file['name'] != null) {
        $category['image'] = $file['name'];
      }
      else {
        unset($category['image']);
      }
      if ($this->Categories->save($category)) {
        if(isset($category['image']) && $category['image'] != null) {
          if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' . DS . $file['name']) == false) {
            $this->Flash->error(__('Image upload error.'));
          }
        }
        $this->Flash->success(__('The category has been saved.'));
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The category could not be saved. Please, try again.'));
      }
    }
    $this->set('niveaux', Configure::read('niveaux'));
    $this->set(compact('category'));
    $this->set('_serialize', ['category']);
  }

  /**
  * Delete method
  *
  * @param string|null $id Category id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $category = $this->Categories->get($id);
    if ($this->Categories->delete($category)) {
      $this->Flash->success(__('The category has been deleted.'));
    } else {
      $this->Flash->error(__('The category could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
  }
}
