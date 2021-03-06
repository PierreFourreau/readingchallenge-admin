<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\SuggestionsController;
use Cake\Mailer\Email;

/**
* Propositions Controller
*
* @property \App\Model\Table\PropositionsTable $Propositions
*/
class PropositionsController extends AppController
{

  /**
  * Index method
  *
  * @return void
  */
  public function index()
  {
    $this->set('propositions', $this->paginate($this->Propositions->find('all')->where(['acceptation' => 0])->contain(['Categories'])));
    $this->set('_serialize', ['propositions']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Proposition id.
  * @return void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $proposition = $this->Propositions->get($id, [
      'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $proposition = $this->Propositions->patchEntity($proposition, $this->request->data);
      if ($this->Propositions->save($proposition)) {
        $this->Flash->success(__('The proposition has been saved.'));
        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The proposition could not be saved. Please, try again.'));
      }
    }
    $categories = $this->Propositions->Categories->find('list', ['limit' => 200]);
    $this->set(compact('proposition', 'categories'));
    $this->set('_serialize', ['proposition']);
  }

  /**
  * Validate method
  *
  * @param string|null $id Proposition id.
  * @return void Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function validate($id = null)
  {
    $proposition = $this->Propositions->get($id);
    $proposition['acceptation'] = 1;
    if($proposition['libelle_fr'] != "" && $proposition['libelle_en'] != "") {
      if ($this->Propositions->save($proposition)) {
        $Suggestions = new SuggestionsController;
        $Suggestions->addAfterValidate($proposition['libelle_fr'], $proposition['libelle_en'], $proposition['url_fr'], $proposition['url_en'],  $proposition['categorie_id']);
        //send email to user
        if(isset($proposition['user_email']) && $proposition['user_email'] != null) {
          if($proposition['user_language'] == 'fr') {
            $content = "Bonjour, Félicitations, votre suggestion vient d'être validée par un administrateur ! A bientôt sur ReadBoard.";
          }
          else {
            $content = "Hello, Congratulations, your suggestion has been approved by administrator ! See you soon on ReadBoard.";
          }
          $email = new Email('default');
          $email->from(['read.board.contact@gmail.com' => 'ReadBoard'])
          ->to($proposition['user_email'])
          ->subject('ReadBoard - suggestion')
          ->send($content);
        }

        return $this->redirect(['action' => 'index']);
      } else {
        $this->Flash->error(__('The proposition could not be saved. Please, try again.'));
        return $this->redirect(['action' => 'index']);
      }
    }
    else {
      $this->Flash->error(__('The proposition could not be saved. Missing libelle ! Please, try again.'));
      return $this->redirect(['action' => 'index']);
    }

  }

  /**
  * Delete method
  *
  * @param string|null $id Proposition id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $proposition = $this->Propositions->get($id);
    if ($this->Propositions->delete($proposition)) {
      $this->Flash->success(__('The proposition has been deleted.'));
    } else {
      $this->Flash->error(__('The proposition could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
  }
}
