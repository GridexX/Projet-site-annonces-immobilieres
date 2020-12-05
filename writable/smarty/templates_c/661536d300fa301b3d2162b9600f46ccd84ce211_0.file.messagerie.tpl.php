<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-04 13:36:45
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\messagerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fca8fcdbef986_10346917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '661536d300fa301b3d2162b9600f46ccd84ce211' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\messagerie.tpl',
      1 => 1607110603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fca8fcdbef986_10346917 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6965832215fca8fcdbee055_83469308', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "output_area"} */
class Block_6965832215fca8fcdbee055_83469308 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_6965832215fca8fcdbee055_83469308',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="flex-container w75 item-center">
    <div class="messaging">
      <div class="inbox_msg">
        <div class="mesgs">
          <span class="msg_name_user"> Username </span>
          <div class="msg_history">
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span>
                </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> 
              </div>
            </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span>
                </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> 
              </div>
            </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>We work directly with our designers and suppliers,
                    and sell direct to you, which means quality, exclusive
                    products, at a price anyone can afford.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span>
                </div>
            </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span>
                </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> 
              </div>
            </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span>
                </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> 
              </div>
            </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>We work directly with our designers and suppliers,
                    and sell direct to you, which means quality, exclusive
                    products, at a price anyone can afford.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span>
                </div>
              </div>
          </div>
        </div>
      </div>    
  </div>
  <div class="right send">
      <input type="text" class="msger-input" placeholder="Enter your message...">
      <button type="submit" class="msger-send-btn">Send</button>
  </div>
</div>
<?php
}
}
/* {/block "output_area"} */
}
