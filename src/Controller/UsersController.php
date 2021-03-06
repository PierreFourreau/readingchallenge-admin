<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    // Permet aux utilisateurs de s'enregistrer et de se déconnecter.
    // $this->Auth->allow(['add', 'logout']);
  }

  public function login()
  {
    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
    }
  }

  public function logout()
  {
    return $this->redirect($this->Auth->logout());
  }

  /**
  * Index method
  *
  * @return void
  */
  public function index()
  {
    $this->set('users', $this->paginate($this->Users));
    $this->set('_serialize', ['users']);
  }

  /**
  * View method
  *
  * @param string|null $id User id.
  * @return void
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function view($id = null)
  {
    $user = $this->Users->get($id, [
      'contain' => []
    ]);
    $this->set('user', $user);
    $this->set('_serialize', ['user']);
  }

  /**
  * Add method
  *
  * @return void Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->data);
      if ($this->Users->save($user)) {
        $this->Flash->success(__('The user has been saved.'));
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
    }
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  /**
  * Edit method
  *
  * @param string|null $id User id.
  * @return void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $user = $this->Users->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $user = $this->Users->patchEntity($user, $this->request->data);
      if ($this->Users->save($user)) {
        $this->Flash->success(__('The user has been saved.'));
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
    }
    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  /**
  * Delete method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    if ($this->Users->delete($user)) {
      $this->Flash->success(__('The user has been deleted.'));
    } else {
      $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
  }
}
