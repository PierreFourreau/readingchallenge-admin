<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Core\Configure;

/**
* Logs Controller
*
* @property \App\Model\Table\SuggestionsTable $Suggestions
*/
class LogsController extends AppController
{
  /**
  * Index method
  *
  * @return void
  */
  public function index()
  {

    $dir = new Folder(Configure::read('api_url'));
    $files = $dir->find('.*\.log');
    $this->set('files', $files);
  }

  /**
  * View method
  *
  * @param string|null $fileName
  * @return void
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function view($fileName = null)
  {
    if(isset($fileName)) {
      $file = new File(Configure::read('api_url') . DS . $fileName);
      $contents = $file->read();
      $this->set('contents', $contents);
    }
  }
}
