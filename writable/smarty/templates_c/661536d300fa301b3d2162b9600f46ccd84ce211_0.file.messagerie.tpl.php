<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-25 19:56:40
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\messagerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe69858c66af9_63023422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '661536d300fa301b3d2162b9600f46ccd84ce211' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\messagerie.tpl',
      1 => 1608947798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe69858c66af9_63023422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1543851555fe69858c566e1_08982979', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "output_area"} */
class Block_1543851555fe69858c566e1_08982979 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_1543851555fe69858c566e1_08982979',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="flex-container w75 item-center">
  <div class="messaging center w100">
    <div class="inbox_msg">
            <span class="msg_name_user"> <?php echo $_smarty_tpl->tpl_vars['user']->value['U_pseudo'];?>
 (<?php echo $_smarty_tpl->tpl_vars['user']->value['U_mail'];?>
) : <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_titre'];?>
</span>
      <div class="mesgs">
        <div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'mess');
$_smarty_tpl->tpl_vars['mess']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mess']->value) {
$_smarty_tpl->tpl_vars['mess']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['mess']->value['U_mail'] === $_smarty_tpl->tpl_vars['user']->value['U_mail']) {?>
          <div class="received_msg">
              <p><?php echo $_smarty_tpl->tpl_vars['mess']->value['M_texte_message'];?>
</p>
              <span class="time_date"> <?php echo $_smarty_tpl->tpl_vars['mess']->value['M_dateheure_message'];?>
</span>
          </div>
        <?php } else { ?>
          <div class="outgoing_msg">
              <p><?php echo $_smarty_tpl->tpl_vars['mess']->value['M_texte_message'];?>
</p>
              <span class="time_date"><?php echo $_smarty_tpl->tpl_vars['mess']->value['M_dateheure_message'];?>
</span> 
          </div>
        <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>              
        </div>
      </div>
    </div>    
  </div>
  <div class="send right">
      <form action="/messagerie/create/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
" method="post" >
        <input name="message" type="text" class="msger-input" placeholder="Enter your message...">
        <button type="submit" class="msger-send-btn">Send</button>
      </form>
  </div>
</div>
<?php
}
}
/* {/block "output_area"} */
}
