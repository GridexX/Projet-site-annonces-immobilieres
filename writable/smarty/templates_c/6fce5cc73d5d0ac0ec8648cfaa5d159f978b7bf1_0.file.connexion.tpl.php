<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-27 10:10:47
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc12507ddab37_88417775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1606493438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc12507ddab37_88417775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10367478095fc12507dcdbc5_14580876', "titre_onglet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10754939965fc12507dced32_83844745', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_10367478095fc12507dcdbc5_14580876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_10367478095fc12507dcdbc5_14580876',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_19129734485fc12507dcf612_81603837 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_12261950855fc12507dd4f43_00599311 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
connect<?php
}
}
/* {/block "action_form"} */
/* {block "disable_mail"} */
class Block_56545205fc12507dd6f40_04313870 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "disable_mail"} */
/* {block "input_inscription"} */
class Block_21392690015fc12507dd79b1_12971839 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription"} */
/* {block "for_mdp"} */
class Block_209697575fc12507dd83c0_90964419 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
>M<?php
}
}
/* {/block "for_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_8445043245fc12507dd8eb2_71000916 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_18285291975fc12507dd9ab5_43023211 extends Smarty_Internal_Block
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
class Block_10754939965fc12507dced32_83844745 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_10754939965fc12507dced32_83844745',
  ),
  'titre_form' => 
  array (
    0 => 'Block_19129734485fc12507dcf612_81603837',
  ),
  'action_form' => 
  array (
    0 => 'Block_12261950855fc12507dd4f43_00599311',
  ),
  'disable_mail' => 
  array (
    0 => 'Block_56545205fc12507dd6f40_04313870',
  ),
  'input_inscription' => 
  array (
    0 => 'Block_21392690015fc12507dd79b1_12971839',
  ),
  'for_mdp' => 
  array (
    0 => 'Block_209697575fc12507dd83c0_90964419',
  ),
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_8445043245fc12507dd8eb2_71000916',
  ),
  'proposition_inscription' => 
  array (
    0 => 'Block_18285291975fc12507dd9ab5_43023211',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19129734485fc12507dcf612_81603837', "titre_form", $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12261950855fc12507dd4f43_00599311', "action_form", $this->tplIndex);
?>
" method="post">
            <div>
            <label for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domain_name.com" pattern=".*@.*\..*" value="<?php echo ((($tmp = @$_SESSION['mail'])===null||$tmp==='' ? '' : $tmp));?>
" <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56545205fc12507dd6f40_04313870', "disable_mail", $this->tplIndex);
?>
 />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21392690015fc12507dd79b1_12971839', "input_inscription", $this->tplIndex);
?>

            <div>
            <label for="mdp"<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_209697575fc12507dd83c0_90964419', "for_mdp", $this->tplIndex);
?>
ot de passe : </label>
            <input class="champs" type="password" name="password" required />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8445043245fc12507dd8eb2_71000916', "input_inscription_confirmation", $this->tplIndex);
?>

            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18285291975fc12507dd9ab5_43023211', "proposition_inscription", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
