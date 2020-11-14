<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-14 07:50:20
  from '/var/www/html/app/Views/templates/inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fafe09c7dbeb9_46909559',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a643b7347ed84456cab33d1a57764df4256983' => 
    array (
      0 => '/var/www/html/app/Views/templates/inscription.tpl',
      1 => 1605361815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fafe09c7dbeb9_46909559 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7956045665fafe09c7da9e3_25997056', "titre_form");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14202819635fafe09c7db766_25745076', "formulaire");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'formulaire.tpl');
}
/* {block "titre_form"} */
class Block_7956045665fafe09c7da9e3_25997056 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_form' => 
  array (
    0 => 'Block_7956045665fafe09c7da9e3_25997056',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Inscription<?php
}
}
/* {/block "titre_form"} */
/* {block "formulaire"} */
class Block_14202819635fafe09c7db766_25745076 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'formulaire' => 
  array (
    0 => 'Block_14202819635fafe09c7db766_25745076',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <form>
        <div>
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" required placeholder="MomoDu69"/>
        </div>
        <div>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" required placeholder="Momo"/>
        </div>
        <div>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" required placeholder="Durant"/>
        </div>
        <div>
        <label for="mail">Mail : </label>
        <input type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*"/>
        </div>
        <div>
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="password" required />
        </div>
        <div>
        <label for="confirmation">Confirmation mot de passe : </label>
        <input type="password" name="confirmation" required />
        </div>
        <div>
        <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
        <input class="btn--danger" type="reset" value="Effacer"/>
        </div>
    </form>
<?php
}
}
/* {/block "formulaire"} */
}
