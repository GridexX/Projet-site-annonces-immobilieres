<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:05:55
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe74343daf330_95181498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '771d4148fd2ad3e12ff02f5d5e547b4a4d0fdc0b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\annonce.tpl',
      1 => 1608991252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe74343daf330_95181498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10244087235fe74343d053c0_66683343', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9021155875fe74343d08922_02522593', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_10244087235fe74343d053c0_66683343 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_10244087235fe74343d053c0_66683343',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Annonce<?php
}
}
/* {/block "titre_onglet"} */
/* {block "output_area"} */
class Block_9021155875fe74343d08922_02522593 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_9021155875fe74343d08922_02522593',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\ThirdParty\\Smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>

    
    <div class="flex-container w75 item-center">
        <div class="annonce-container w60 item-center">
            <div class="img-annonce">
                <div class="flex-container item-center">
                    <div class="slider">                        
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_photo']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                            <input type="radio" id="i<?php echo $_smarty_tpl->tpl_vars['photo']->value['index'];?>
" name="images" <?php echo $_smarty_tpl->tpl_vars['photo']->value['index'] === 1 ? 'checked' : '';?>
 /> 
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_photo']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                            <div class="slide_img" id="<?php echo $_smarty_tpl->tpl_vars['photo']->value['lDivID'];?>
">                                
                                <img src="/uploads/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['P_titre'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['photo']->value['P_nom'];?>
">  
                                <?php if (count($_smarty_tpl->tpl_vars['liste_photo']->value) > 1) {?>
                                    <label class="prev" for="i<?php echo $_smarty_tpl->tpl_vars['photo']->value['prev'];?>
"><span>&#x2039;</span></label>
                                    <label class="next" for="i<?php echo $_smarty_tpl->tpl_vars['photo']->value['next'];?>
"><span>&#x203a;</span></label>	                            
                                <?php }?>
                            </div> 
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <div id="nav_slide">
                        <?php if (count($_smarty_tpl->tpl_vars['liste_photo']->value) > 1) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_photo']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                                <label for="i<?php echo $_smarty_tpl->tpl_vars['photo']->value['index'];?>
" class="dots" id="dot<?php echo $_smarty_tpl->tpl_vars['photo']->value['index'];?>
"></label>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="txt-annnonce-container">
                <h3 class="titre_annonce"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_titre'];?>
</h3>
                <p class="h6-like"><span class="texte-orange"><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_cout_loyer']+$_smarty_tpl->tpl_vars['annonce']->value['A_cout_charges'];?>
€ </span>Charges comprises</p>
                <small><i>Le <?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
</i></small>
                <hr class="ligne-footer">
                <p class="h6-like">Criteres</p>
                <div class=critères>
                    <div class="flex-container">
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Localisation :</p>
                                <p><b><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_adresse'];?>
 <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_ville'];?>
 <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_CP'];?>
</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-tape"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Surface : </p>
                                <p><b><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_superficie'];?>
 m²</b></p>
                            </span>
                        </div>
                        <div class="w33  critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-shapes"></i>
                            </div>
                            <span class="w60 txt-critere">
                                <p>Pièces : </p>
                                <p><b><?php echo substr($_smarty_tpl->tpl_vars['annonce']->value['T_type'],1,2);?>
</b></p>
                            </span>
                        </div>
                    </div>

                    <div class="flex-container">
                        
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-couch"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Meublé :</p>
                                <p><b><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_est_meuble'] ? 'Meublé' : 'Non Meublé';?>
</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w10 right icon-critere">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span class="w90 txt-critere ">
                                <p>Classe énergie : </p>

                                <p>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 50) {?> energie-courante <?php }?> critere-A">A</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 51 && $_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 90) {?> energie-courante <?php }?> critere-B">B</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 91 && $_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 150) {?> energie-courante <?php }?> critere-C">C</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 151 && $_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 230) {?> energie-courante <?php }?> critere-D">D</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 231 && $_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 330) {?> energie-courante <?php }?> critere-E">E</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 331 && $_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] <= 450) {?> energie-courante <?php }?> critere-F">F</span>
                                    <span class="critere-energie <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'] >= 451) {?> energie-courante <?php }?> critere-G">G</span>

                                </p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-burn"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Chauffage :</p>
                                <p><b><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage']);?>
</b></p>
                            </span>
                        </div>
                    </div>
                    
                </div>
                <hr class="ligne-footer">
                <p class="h6-like">Description</p>
                <pre><?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_description'];?>
</pre>
                <br><br>
                <hr class="ligne-footer">
            </div>

            <div class="utilisateur_container">
                                <?php if ((isset($_SESSION['mail'])) && $_SESSION['mail'] === $_smarty_tpl->tpl_vars['annonce']->value['U_mail']) {?>
                    <a href="/annonce/view/edition_annonce/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
"><button class="btn--primary"><i class="fas fa-edit"></i> Editer l'annonce</button></a>
                    <?php if ($_smarty_tpl->tpl_vars['annonce']->value['A_etat'] === 'publiée') {?>
                        <a href="/annonce/changerEtat/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/en cours"><button class="btn--danger"><i class="fas fa-eye-slash"></i> Masquer l'annonce du site</button></a>
                    <?php } else { ?>
                    <a href="/annonce/changerEtat/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/publiée"><button class="btn--success"><i class="fas fa-arrow-circle-up"></i> Publier l'annonce</button></a>
                    <?php }?>
                <?php } else { ?>                    <p><?php echo $_smarty_tpl->tpl_vars['proprio']->value['U_pseudo'];?>
 | <i>Nb annonces : </i></p>
                <a href="/messagerie/view/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
"><button class="btn--primary"><i class="fas fa-comments"></i> Envoyer un message</button></a>
                <?php }?>

            </div>
        </div>
        
    </div>
<?php
}
}
/* {/block "output_area"} */
}
