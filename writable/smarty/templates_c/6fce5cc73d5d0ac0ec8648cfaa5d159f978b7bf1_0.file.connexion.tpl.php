<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-31 08:06:45
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feddaf513cfa8_27931807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1609423604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5feddaf513cfa8_27931807 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4025940855feddaf511e618_61101383', "titre_onglet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1454520295feddaf5120113_83859724', "output_area");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_4025940855feddaf511e618_61101383 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_4025940855feddaf511e618_61101383',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_21098676785feddaf5124212_03076903 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_955506785feddaf5129331_99124723 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
connect<?php
}
}
/* {/block "action_form"} */
/* {block "disable_mail"} */
class Block_638013745feddaf5135bc7_37513115 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "disable_mail"} */
/* {block "input_inscription"} */
class Block_13628946535feddaf5136ee0_63601814 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription"} */
/* {block "for_mdp"} */
class Block_5498468185feddaf5138b08_20004701 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
>M<?php
}
}
/* {/block "for_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_17149253515feddaf5139c22_61260593 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_17331447745feddaf513ac98_69314304 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <span>
                <p>Pas encore de compte ? <a href="/pages/view/inscription">S'inscrire</a> </p>
            </span>
            <?php
}
}
/* {/block "proposition_inscription"} */
/* {block "delete_user"} */
class Block_6219647045feddaf513ba30_06248841 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "delete_user"} */
/* {block "output_area"} */
class Block_1454520295feddaf5120113_83859724 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_1454520295feddaf5120113_83859724',
  ),
  'titre_form' => 
  array (
    0 => 'Block_21098676785feddaf5124212_03076903',
  ),
  'action_form' => 
  array (
    0 => 'Block_955506785feddaf5129331_99124723',
  ),
  'disable_mail' => 
  array (
    0 => 'Block_638013745feddaf5135bc7_37513115',
  ),
  'input_inscription' => 
  array (
    0 => 'Block_13628946535feddaf5136ee0_63601814',
  ),
  'for_mdp' => 
  array (
    0 => 'Block_5498468185feddaf5138b08_20004701',
  ),
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_17149253515feddaf5139c22_61260593',
  ),
  'proposition_inscription' => 
  array (
    0 => 'Block_17331447745feddaf513ac98_69314304',
  ),
  'delete_user' => 
  array (
    0 => 'Block_6219647045feddaf513ba30_06248841',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['confirmation']->value))) {?>
        <div class="flex-container">
            <div class="annonce-container formulaire w40 item-center txtcenter">
                <p>Etes vous sur de vouloir supprimer votre compte ?</p>
                <a href="/utilisateur/delete/true"><button class="btn--primary" >Oui</button></a>
                <a href="/pages/view/edition_profil"><button class="btn--danger" >Non</button></a>
                
            </div>
        </div>
    <?php }?>
    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21098676785feddaf5124212_03076903', "titre_form", $this->tplIndex);
?>
</h2>
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                <h6 style="color:red; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h6>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['succes']->value))) {?>
                <h6 style="color:green; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['succes']->value;?>
</h6>
            <?php }?>
            <form class="formulaire" action="/Utilisateur/<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_955506785feddaf5129331_99124723', "action_form", $this->tplIndex);
?>
" method="post">
            <div>
            <label class="" for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domaine.extension" pattern=".*@.*\..*" value="<?php echo ((($tmp = @$_smarty_tpl->tpl_vars['uti']->value['U_mail'])===null||$tmp==='' ? ((($tmp = @$_SESSION['mail'])===null||$tmp==='' ? '' : $tmp)) : $tmp));?>
" oninvalid="this.setCustomValidity('L\'email doit être sous la forme xxx@domaine.alias')" <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_638013745feddaf5135bc7_37513115', "disable_mail", $this->tplIndex);
?>
 />
            
            </div>
            
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13628946535feddaf5136ee0_63601814', "input_inscription", $this->tplIndex);
?>

            <?php if (!(isset($_smarty_tpl->tpl_vars['uti']->value))) {?>
            <div>
            <label for="mdp"<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5498468185feddaf5138b08_20004701', "for_mdp", $this->tplIndex);
?>
ot de passe : </label>
            <input class="champs" type="password" name="password" oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 6 caractères')" required  />
            </div>
            
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17149253515feddaf5139c22_61260593', "input_inscription_confirmation", $this->tplIndex);
?>

            <?php }?>
            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17331447745feddaf513ac98_69314304', "proposition_inscription", $this->tplIndex);
?>

        </div>
    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6219647045feddaf513ba30_06248841', "delete_user", $this->tplIndex);
?>

<?php
}
}
/* {/block "output_area"} */
}
