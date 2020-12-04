<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-04 04:03:53
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fca0989f1d115_12334156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1607076101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fca0989f1d115_12334156 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6111342525fca0989f08bc3_05992507', "titre_onglet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13348444955fca0989f0acb6_13288649', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_6111342525fca0989f08bc3_05992507 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_6111342525fca0989f08bc3_05992507',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_718362855fca0989f0b839_29733426 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_9585182805fca0989f130a1_72217330 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
connect<?php
}
}
/* {/block "action_form"} */
/* {block "disable_mail"} */
class Block_19821142735fca0989f19883_03474496 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "disable_mail"} */
/* {block "input_inscription"} */
class Block_10661199385fca0989f1a2c2_50131664 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription"} */
/* {block "for_mdp"} */
class Block_9307377775fca0989f1ac52_42598159 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
>M<?php
}
}
/* {/block "for_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_8993081885fca0989f1b962_33281791 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_19933161525fca0989f1c2c4_88197423 extends Smarty_Internal_Block
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
/* {block "output_area"} */
class Block_13348444955fca0989f0acb6_13288649 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_13348444955fca0989f0acb6_13288649',
  ),
  'titre_form' => 
  array (
    0 => 'Block_718362855fca0989f0b839_29733426',
  ),
  'action_form' => 
  array (
    0 => 'Block_9585182805fca0989f130a1_72217330',
  ),
  'disable_mail' => 
  array (
    0 => 'Block_19821142735fca0989f19883_03474496',
  ),
  'input_inscription' => 
  array (
    0 => 'Block_10661199385fca0989f1a2c2_50131664',
  ),
  'for_mdp' => 
  array (
    0 => 'Block_9307377775fca0989f1ac52_42598159',
  ),
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_8993081885fca0989f1b962_33281791',
  ),
  'proposition_inscription' => 
  array (
    0 => 'Block_19933161525fca0989f1c2c4_88197423',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_718362855fca0989f0b839_29733426', "titre_form", $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9585182805fca0989f130a1_72217330', "action_form", $this->tplIndex);
?>
" method="post">
            <div>
            <label for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domaine.extension" pattern=".*@.*\..*" value="<?php echo ((($tmp = @$_SESSION['mail'])===null||$tmp==='' ? '' : $tmp));?>
" oninvalid="this.setCustomValidity('L\'email doit être sous la forme xxx@domaine.alias')" <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19821142735fca0989f19883_03474496', "disable_mail", $this->tplIndex);
?>
 />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10661199385fca0989f1a2c2_50131664', "input_inscription", $this->tplIndex);
?>

            <div>
            <label for="mdp"<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9307377775fca0989f1ac52_42598159', "for_mdp", $this->tplIndex);
?>
ot de passe : </label>
            <input class="champs" type="password" name="password" oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 6 caractères')" required  />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8993081885fca0989f1b962_33281791', "input_inscription_confirmation", $this->tplIndex);
?>

            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19933161525fca0989f1c2c4_88197423', "proposition_inscription", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
