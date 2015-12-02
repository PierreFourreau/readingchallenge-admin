<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suggestions Controller
 *
 * @property \App\Model\Table\SuggestionsTable $Suggestions
 */
class SuggestionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $this->set('suggestions', $this->paginate($this->Suggestions));
        $this->set('categorie_id', $this->request->pass[0]);
        $this->set('_serialize', ['suggestions']);
    }

    /**
     * View method
     *
     * @param string|null $id Suggestion id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suggestion = $this->Suggestions->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('suggestion', $suggestion);
        $this->set('_serialize', ['suggestion']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suggestion = $this->Suggestions->newEntity();
        if ($this->request->is('post')) {
            $suggestion = $this->Suggestions->patchEntity($suggestion, $this->request->data);
            $suggestion['categorie_id'] = $this->request->pass[0];
            if ($this->Suggestions->save($suggestion)) {
                $this->Flash->success(__('The suggestion has been saved.'));
                return $this->redirect(['controller' => 'categories', 'action' => 'view', $suggestion['categorie_id']]);
            } else {
                $this->Flash->error(__('The suggestion could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Suggestions->Categories->find('list', ['limit' => 200]);
        $this->set(compact('suggestion', 'categories'));
        $this->set('_serialize', ['suggestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suggestion id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suggestion = $this->Suggestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suggestion = $this->Suggestions->patchEntity($suggestion, $this->request->data);
            if ($this->Suggestions->save($suggestion)) {
                $this->Flash->success(__('The suggestion has been saved.'));
                return $this->redirect(['controller' => 'categories', 'action' => 'view', $suggestion['categorie_id']]);
            } else {
                $this->Flash->error(__('The suggestion could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Suggestions->Categories->find('list', ['limit' => 200]);
        $this->set(compact('suggestion', 'categories'));
        $this->set('_serialize', ['suggestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suggestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suggestion = $this->Suggestions->get($id);
        if ($this->Suggestions->delete($suggestion)) {
            $this->Flash->success(__('The suggestion has been deleted.'));
        } else {
            $this->Flash->error(__('The suggestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'categories', 'action' => 'view', $suggestion['categorie_id']]);
    }
}
