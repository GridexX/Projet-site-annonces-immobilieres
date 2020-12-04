<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-29 10:08:38
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc3c786016e08_26109921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1606666004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc3c786016e08_26109921 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1883852415fc3c786003964_61413012', "titre_onglet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18506501625fc3c786004671_85683984', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_1883852415fc3c786003964_61413012 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_1883852415fc3c786003964_61413012',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_7189810195fc3c786004d51_42839552 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_14784725875fc3c78600aad7_07526015 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
connect<?php
}
}
/* {/block "action_form"} */
/* {block "disable_mail"} */
class Block_583040195fc3c786011f90_25449725 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "disable_mail"} */
/* {block "input_inscription"} */
class Block_6426689755fc3c7860129c0_66320065 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription"} */
/* {block "for_mdp"} */
class Block_17284051595fc3c7860132c7_93274472 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
>M<?php
}
}
/* {/block "for_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_16964840825fc3c7860141b8_04439806 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_14798519455fc3c786015005_27246984 extends Smarty_Internal_Block
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
class Block_18506501625fc3c786004671_85683984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_18506501625fc3c786004671_85683984',
  ),
  'titre_form' => 
  array (
    0 => 'Block_7189810195fc3c786004d51_42839552',
  ),
  'action_form' => 
  array (
    0 => 'Block_14784725875fc3c78600aad7_07526015',
  ),
  'disable_mail' => 
  array (
    0 => 'Block_583040195fc3c786011f90_25449725',
  ),
  'input_inscription' => 
  array (
    0 => 'Block_6426689755fc3c7860129c0_66320065',
  ),
  'for_mdp' => 
  array (
    0 => 'Block_17284051595fc3c7860132c7_93274472',
  ),
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_16964840825fc3c7860141b8_04439806',
  ),
  'proposition_inscription' => 
  array (
    0 => 'Block_14798519455fc3c786015005_27246984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container" style="margin-top: 2rem;">
        <div class="formulaire-container w40 item-center txtcenter">
            <h2><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7189810195fc3c786004d51_42839552', "titre_form", $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14784725875fc3c78600aad7_07526015', "action_form", $this->tplIndex);
?>
" method="post">
            <div>
            <label for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domaine.extension" pattern=".*@.*\..*" value="<?php echo ((($tmp = @$_SESSION['mail'])===null||$tmp==='' ? '' : $tmp));?>
" oninvalid="this.setCustomValidity('L\'email doit être sous la forme xxx@domaine.alias')" <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_583040195fc3c786011f90_25449725', "disable_mail", $this->tplIndex);
?>
 />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6426689755fc3c7860129c0_66320065', "input_inscription", $this->tplIndex);
?>

            <div>
            <label for="mdp"<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17284051595fc3c7860132c7_93274472', "for_mdp", $this->tplIndex);
?>
ot de passe : </label>
            <input class="champs" type="password" name="password" oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 6 caractères')" required  />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16964840825fc3c7860141b8_04439806', "input_inscription_confirmation", $this->tplIndex);
?>

            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14798519455fc3c786015005_27246984', "proposition_inscription", $this->tplIndex);
?>

        </div>
    </div>
<?php
}
}
/* {/block "output_area"} */
}
