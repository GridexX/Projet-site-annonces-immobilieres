<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-10 13:54:27
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\edition_annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd27cf350ae42_68176670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ecf21c0116edc76b4f6920a8a9117c36a0b37b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\edition_annonce.tpl',
      1 => 1607192134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd27cf350ae42_68176670 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7508731335fd27cf3371392_38336437', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19254305205fd27cf3372c85_02562765', "output_area");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_7508731335fd27cf3371392_38336437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_7508731335fd27cf3371392_38336437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Editer l'annonce<?php
}
}
/* {/block "titre_onglet"} */
/* {block 'action'} */
class Block_11059908665fd27cf3387b33_90485458 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
update/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];
}
}
/* {/block 'action'} */
/* {block "titre_form"} */
class Block_652766155fd27cf3389fb7_04349146 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Editer l'annonce<?php
}
}
/* {/block "titre_form"} */
/* {block "output_area"} */
class Block_19254305205fd27cf3372c85_02562765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_19254305205fd27cf3372c85_02562765',
  ),
  'action' => 
  array (
    0 => 'Block_11059908665fd27cf3387b33_90485458',
  ),
  'titre_form' => 
  array (
    0 => 'Block_652766155fd27cf3389fb7_04349146',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center">
            <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
                <h6 style="color:red; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h6>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['succes']->value))) {?>
                <h6 style="color:green; font-style:italic;"><?php echo $_smarty_tpl->tpl_vars['succes']->value;?>
</h6>
            <?php }?>
            <form class="formulaire" action="/annonce/<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11059908665fd27cf3387b33_90485458', 'action', $this->tplIndex);
?>
" method="post">
                <div class="txtcenter div-input">
                    <h3 class="txtcenter"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_652766155fd27cf3389fb7_04349146', "titre_form", $this->tplIndex);
?>
</h3>
                    <div>
                        <label for="titre"> Titre : </label>
                        <input class="champs" type="text" name="titre" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_titre'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="Paris 15 Studio Balcon" pattern="..* ..* ..*" oninvalid="this.setCustomValidity('Doit contenir au moins 3 mots')" />
                    </div>
                    <div>
                        <label for="type"><i class="fas fa-home"></i></i> Type : </label>
                        <select class="champs" name="type">                 
                            <option value="T1" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T1' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T1</option>
                            <option value="T2" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T2' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T2</option>
                            <option value="T3" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T3' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T3</option>
                            <option value="T4" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T4' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T4</option>
                            <option value="T5" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T5' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T5</option>
                            <option value="T6" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['T_type'] === 'T6' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
>T6</option>
                        </select>
                    </div>
                    <div>
                        <label for="loyer"><i class="fas fa-money-check-alt"></i> Loyer : </label>
                        <input class="champs" type="text" name="loyer" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_cout_loyer'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="600.00 €" pattern="(([0-9]*\.[0-9]{2})|[0-9]*)" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label for="charges"><i class="fas fa-euro-sign"></i> Charges : </label>
                        <input class="champs" type="text" name="charges" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_cout_charges'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="50.00 €" pattern="(([0-9]*\.[0-9]{2})|[0-9]*)" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                        <select class="champs" name="chauffage" onchange="chauffageSelectCheck(this);" >                 
                            <option value="individuel" id="chauffageIndOption" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage'] === 'individuel' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
 >Individuel</option>
                            <option value="collectif" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage'] === 'collectif' ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
 >Collectif</option>
                        </select>
                    </div>
                    <div id="chauffageDivCheck" style="display:<?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage'] === 'individuel' ? 'block' : 'none'))===null||$tmp==='' ? '' : $tmp);?>
";>
                        <label for="chauffage"><i class="fas fa-burn"></i> Type Chauffage : </label>
                        <select class="champs" name="engie" onchange="engieSelectCheck(this);" >   
                            <?php if ((isset($_smarty_tpl->tpl_vars['energie']->value))) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['energie']->value, 'i');
$_smarty_tpl->tpl_vars['i']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value['E_id_engie'];?>
" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['E_id_engie'] === $_smarty_tpl->tpl_vars['i']->value['E_id_engie'] ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
 ><?php echo $_smarty_tpl->tpl_vars['i']->value['E_description'];?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                            <?php }?>
                            <option id="autreTypeChauffage" value="autreTypeChauffage">Ajouter un autre type de chauffage</option>         
                        </select>
                    </div>
                    <div id="typeChauffageDivCheck" style="display:none;">
                        <label for="chauffage"><i class="fas fa-burn"></i> <b>Nouveau :</b> </label>
                        <input class="champs" type="text" name="nouv_energie" placeholder="Tapez ici le nouveau type de chauffage" oninvalid="this.setCustomValidity('Veuillez entrez un type de chauffage')" />
                    </div>
                    <div>
                        <label for="charges"><i class="fas fa-bolt"></i> Performance energétique : </label>
                        <input class="champs" type="text" name="perf_energie" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_perf_energie'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="200" pattern="([0-9]{1,3}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 999')" />
                        <span class="input-icon-end" style="margin-left: -9rem;">kWh/m²/an</span>
                    </div>
                    <div>
                        <label for="superficie"><i class="fas fa-tape"></i> Superficie : </label>
                        <input class="champs" type="text" name="superficie" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_superficie'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="100m²" pattern="[0-9]*" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 9999')" />
                        <span class="input-icon-end" style="margin-left: -3rem;">m²</span>
                    </div>
                    <div>
                        <label for="meuble"><i class="fas fa-couch"></i> Meublé : </label>
                        <select class="champs" name="meuble">                 
                            <option value="estMeuble" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['A_est_meuble'] ? 'selected' : ''))===null||$tmp==='' ? '' : $tmp);?>
 >Oui</option>
                            <option value="nonMeuble" <?php echo (($tmp = @($_smarty_tpl->tpl_vars['annonce']->value['A_est_meuble'] ? '' : 'selected'))===null||$tmp==='' ? '' : $tmp);?>
 >Non</option>
                        </select>
                    </div>
                </div>
                <hr class="ligne-footer">
                <div class="Description">
                    <p class="h6-like">Description : </p>
                    <textarea class="text-description" name="description" required placeholder="Tapez ici votre description" rows="10" cols="80"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_description'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                    
                </div>
                <hr class="ligne-footer">
                <div class="localisation div-input">
                    <p class="h6-like">Localisation</p>
                    <div>
                    <label for="adresse">Adresse : </label>
                        <input class="champs" type="text" name="adresse" required value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_adresse'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="15 rue des Champs Élysées" pattern="[0-9]{1,} ..* ..*"  oninvalid="this.setCustomValidity('Doit contenir le numéro puis 2 mots')" />
                    </div>
                    <div class="flex-container">
                        <div class="w50">
                            <label for="ville" class="label-cp">Ville : </label>
                            <input class="champs champs-cp" type="text" name="ville" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_ville'])===null||$tmp==='' ? '' : $tmp);?>
" required placeholder="Paris"/>
                        </div>
                        <div class="w50">
                            <label for="cp" class="label-cp">Code Postal : </label>
                            <input class="champs champs-cp" type="text" name="cp" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annonce']->value['A_CP'])===null||$tmp==='' ? '' : $tmp);?>
" required placeholder="75000" pattern="[0-9]{5}"  oninvalid="this.setCustomValidity('5 chiffres')" />
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
                    <input class="btn--danger" type="reset" value="Effacer"/>
                </div>
            </form>
        </div>
    </div>    

    <?php echo '<script'; ?>
>
        function chauffageSelectCheck(nameSelect)
        {
            console.log(nameSelect.value);
            if(nameSelect)
            {
                if(nameSelect.value === 'individuel'){
                    document.getElementById("chauffageDivCheck").style.display = "block";
                }
                else
                {
                    document.getElementById("chauffageDivCheck").style.display = "none";
                    document.getElementById("typeChauffageDivCheck").style.display = "none";
                }
            }
            else
            {
                document.getElementById("chauffageDivCheck").style.display = "none";
                document.getElementById("typeChauffageDivCheck").style.display = "none";
            }
        }

        function engieSelectCheck(nameSelect)
        {
            if(nameSelect)
            {
                if(nameSelect.value === 'autreTypeChauffage')
                {
                    document.getElementById("typeChauffageDivCheck").style.display = "block";
                }
                else
                {
                    document.getElementById("typeChauffageDivCheck").style.display = "none";
                }
            }
            else
            {
                document.getElementById("typeChauffageDivCheck").style.display = "none";
            }
        }
    <?php echo '</script'; ?>
>  
<?php
}
}
/* {/block "output_area"} */
}
