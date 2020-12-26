<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 10:32:11
  from '/var/www/html/app/Views/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe7658bc62403_78481890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fce5cc73d5d0ac0ec8648cfaa5d159f978b7bf1' => 
    array (
      0 => '/var/www/html/app/Views/templates/connexion.tpl',
      1 => 1609000301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe7658bc62403_78481890 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2720444975fe7658bc44896_30673844', "titre_onglet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13980259035fe7658bc45d26_17130273', "output_area");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_2720444975fe7658bc44896_30673844 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_2720444975fe7658bc44896_30673844',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_onglet"} */
/* {block "titre_form"} */
class Block_5769803565fe7658bc4cda6_58486371 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Connexion<?php
}
}
/* {/block "titre_form"} */
/* {block "action_form"} */
class Block_12092021155fe7658bc54220_60785998 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
connect<?php
}
}
/* {/block "action_form"} */
/* {block "disable_mail"} */
class Block_827945395fe7658bc5cab9_41847174 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "disable_mail"} */
/* {block "input_inscription"} */
class Block_10074339515fe7658bc5dc31_93552213 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription"} */
/* {block "for_mdp"} */
class Block_5852558195fe7658bc5e880_46822562 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
>M<?php
}
}
/* {/block "for_mdp"} */
/* {block "input_inscription_confirmation"} */
class Block_12321086805fe7658bc5f749_65822855 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "input_inscription_confirmation"} */
/* {block "proposition_inscription"} */
class Block_8967932575fe7658bc60350_10781691 extends Smarty_Internal_Block
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
class Block_16815209415fe7658bc61108_00622776 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "delete_user"} */
/* {block "output_area"} */
class Block_13980259035fe7658bc45d26_17130273 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_13980259035fe7658bc45d26_17130273',
  ),
  'titre_form' => 
  array (
    0 => 'Block_5769803565fe7658bc4cda6_58486371',
  ),
  'action_form' => 
  array (
    0 => 'Block_12092021155fe7658bc54220_60785998',
  ),
  'disable_mail' => 
  array (
    0 => 'Block_827945395fe7658bc5cab9_41847174',
  ),
  'input_inscription' => 
  array (
    0 => 'Block_10074339515fe7658bc5dc31_93552213',
  ),
  'for_mdp' => 
  array (
    0 => 'Block_5852558195fe7658bc5e880_46822562',
  ),
  'input_inscription_confirmation' => 
  array (
    0 => 'Block_12321086805fe7658bc5f749_65822855',
  ),
  'proposition_inscription' => 
  array (
    0 => 'Block_8967932575fe7658bc60350_10781691',
  ),
  'delete_user' => 
  array (
    0 => 'Block_16815209415fe7658bc61108_00622776',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5769803565fe7658bc4cda6_58486371', "titre_form", $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12092021155fe7658bc54220_60785998', "action_form", $this->tplIndex);
?>
" method="post">
            <div>
            <label class="" for="mail">Mail : </label>
            <input class="champs" type="text" name="mail" required placeholder="xxx@domaine.extension" pattern=".*@.*\..*" value="<?php echo ((($tmp = @$_SESSION['mail'])===null||$tmp==='' ? '' : $tmp));?>
" oninvalid="this.setCustomValidity('L\'email doit être sous la forme xxx@domaine.alias')" <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_827945395fe7658bc5cab9_41847174', "disable_mail", $this->tplIndex);
?>
 />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10074339515fe7658bc5dc31_93552213', "input_inscription", $this->tplIndex);
?>

            <div>
            <label for="mdp"<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5852558195fe7658bc5e880_46822562', "for_mdp", $this->tplIndex);
?>
ot de passe : </label>
            <input class="champs" type="password" name="password" oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 6 caractères')" required  />
            </div>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12321086805fe7658bc5f749_65822855', "input_inscription_confirmation", $this->tplIndex);
?>

            <div>
            <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
            <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
            </form>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8967932575fe7658bc60350_10781691', "proposition_inscription", $this->tplIndex);
?>

        </div>
    </div>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16815209415fe7658bc61108_00622776', "delete_user", $this->tplIndex);
?>

<?php
}
}
/* {/block "output_area"} */
}
