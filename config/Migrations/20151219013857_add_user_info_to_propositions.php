<?php
use Migrations\AbstractMigration;

class AddUserInfoToPropositions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('propositions');
        $table->addColumn('user_language', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('user_email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->update();
    }
}
