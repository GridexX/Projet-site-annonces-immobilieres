<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-26 08:02:20
  from 'C:\xampp\htdocs\Projet-site-annonces-immobilieres\app\Views\templates\edition_annonce.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe7426c261fb1_73701612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ecf21c0116edc76b4f6920a8a9117c36a0b37b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projet-site-annonces-immobilieres\\app\\Views\\templates\\edition_annonce.tpl',
      1 => 1608991252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe7426c261fb1_73701612 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1143326295fe7426c1c2227_77075744', "titre_onglet");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3885450185fe7426c1c4060_20661962', "output_area");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'main.tpl');
}
/* {block "titre_onglet"} */
class Block_1143326295fe7426c1c2227_77075744 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'titre_onglet' => 
  array (
    0 => 'Block_1143326295fe7426c1c2227_77075744',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Editer l'annonce<?php
}
}
/* {/block "titre_onglet"} */
/* {block 'action'} */
class Block_1448677985fe7426c1eb784_93649469 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
update/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];
}
}
/* {/block 'action'} */
/* {block "titre_form"} */
class Block_14271216535fe7426c1ede09_19426106 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Editer l'annonce<?php
}
}
/* {/block "titre_form"} */
/* {block "script"} */
class Block_18240411185fe7426c25db06_07966060 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
/* {block "output_area"} */
class Block_3885450185fe7426c1c4060_20661962 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'output_area' => 
  array (
    0 => 'Block_3885450185fe7426c1c4060_20661962',
  ),
  'action' => 
  array (
    0 => 'Block_1448677985fe7426c1eb784_93649469',
  ),
  'titre_form' => 
  array (
    0 => 'Block_14271216535fe7426c1ede09_19426106',
  ),
  'script' => 
  array (
    0 => 'Block_18240411185fe7426c25db06_07966060',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['confirmation']->value))) {?>
        <div class="flex-container w75 item-center">
            <div class="annonce-container formulaire w60 item-center">
                <p>Etes vous sur de vouloir supprimer l'annonce ?</p>

                <a href="/annonce/delete/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/true"><button class="btn--primary" >Oui</button></a>
                <a href="/annonce/view/edition_annonce/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
"><button class="btn--danger" >Non</button></a>
                
            </div>
        </div>
    <?php }?>
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1448677985fe7426c1eb784_93649469', 'action', $this->tplIndex);
?>
" method="post" enctype="multipart/form-data" >
                <div class="txtcenter div-input">
                    <h3 class="txtcenter"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14271216535fe7426c1ede09_19426106', "titre_form", $this->tplIndex);
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
                    <div id="chauffageDivCheck" style="display: <?php if ((isset($_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage']))) {?> <?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_type_chauffage'] === 'individuel' ? 'block;' : 'none;';?>
 <?php } else { ?>'block;'<?php }?> " >
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
                <div class="Photos">
                    <p class="h6-like">Photos : </p>
                        <div id="change-photos">
                            <div class="flex-container txt-centrer w100">
                            <?php if ((isset($_smarty_tpl->tpl_vars['liste_photo']->value))) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_photo']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                                <div class="w<?php echo $_smarty_tpl->tpl_vars['taille_div']->value;?>
">
                                
                                <img src='/uploads/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['P_titre'];?>
' alt="<?php echo $_smarty_tpl->tpl_vars['photo']->value['P_nom'];?>
" />
                                
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php } else { ?>
                               <p>Pas de photos pour cette annonce  </p> 
                            <?php }?>
                            </div>
                            <label class="btn--success" for="changer les photos de l'annonce" onclick="javascript:showInputButton()" >Changer les photos</label>
                        </div>
                        <div id="obj-photos">
                        <label class="btn--success" for="image_uploads" style="width:auto;">Sélectionner des images à uploader (PNG, JPG)</label>
                        
                        <input class="champs" type="file" id="image_uploads" style="cursor:default;" name="images[]" accept=".jpg, .jpeg, .png" multiple value="Sélectionner des images à uploader (PNG, JPG)" >

                        <div class="preview flex-container item-center txt-center">
                            <div class="w90 item-center txt-center">
                                <p>Aucun fichier sélectionné pour le moment</p>
                            </div>
                        </div>
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
                    <input class="btn--primary" id="submit-button" type="submit" value="Valider" name="inscription" />
                    <input class="btn--danger" type="reset" value="Effacer"/>
                </div>
            </form>

        </div>
    </div> 
    <?php if ((isset($_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'])) && !(isset($_smarty_tpl->tpl_vars['confirmation']->value))) {?>
    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center txtcenter">   

            <form class="formulaire" action="/annonce/delete/<?php echo $_smarty_tpl->tpl_vars['annonce']->value['A_idannonce'];?>
" method="post"  >
                <input class="btn--dark" id="submit-button" type="submit" value="Supprimer l'annonce" name="suppression" />
            </form>

        </div>
    </div>
    <?php }?>
    <?php echo '<script'; ?>
>

        var input = document.querySelector('#image_uploads');
        var preview = document.querySelector('.preview');
        document.getElementById("obj-photos").style.display = "none";
        input.style.opacity = 0;

        input.addEventListener('change', updateImageDisplay);

        function showInputButton()
        {
            document.getElementById("obj-photos").style.display = "block";
            document.getElementById("change-photos").style.display = "none";
        }

        function updateImageDisplay() 
        {
            document.getElementById('submit-button').disabled = false;
            while(preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            var curFiles = input.files;
            if(curFiles.length === 0) 
            {
                var para = document.createElement('p');
                para.textContent = 'Pas encore d\'images de sélectionnées';
                preview.appendChild(para);
            } 
            else
            {
                var list = document.createElement('ol');
                preview.appendChild(list);
                if(curFiles.length <= 5)
                {
                    for(var i = 0; i < curFiles.length; i++) 
                    {
                        var listItem = document.createElement('li');
                        var para = document.createElement('p');
                        if(validFileType(curFiles[i])) 
                        {
                            para.textContent = 'Fichier : ' + curFiles[i].name + ', taille : ' + returnFileSize(curFiles[i].size) + '.';
                            var image = document.createElement('img');
                            image.src = window.URL.createObjectURL(curFiles[i]);
                            listItem.appendChild(para);
                            listItem.appendChild(image);
                            listItem.appendChild(document.createElement('hr'));
                        } 
                        else 
                        {
                            para.textContent = 'Fichier : ' + curFiles[i].name + ' n\'est pas dans un format valide. Veuillez le changer.';
                            listItem.appendChild(para);
                        }

                        list.appendChild(listItem);
                    }
                }
                else
                {
                    var div = document.createElement('div');
                    var title = document.createElement('h5');
                    var para = document.createElement('p');
                    document.getElementById('submit-button').disabled = true;
                    div.classList.add("notif-container");

                    div.classList.add("warning");

                    title.textContent = "Warning : "
                    para.textContent = "Vous avez inséré trop de photos, veuillez en enlever";
                    
                    div.appendChild(title);
                    div.appendChild(para);
                    list.appendChild(div);
                }
            }
        }

        var fileTypes = [
            'image/jpeg',
            'image/jpg',
            'image/png'
        ]

        function validFileType(file) 
        {
            for(var i = 0; i < fileTypes.length; i++) 
            {
                if(file.type === fileTypes[i]) 
                {
                return true;
                }
            }

            return false;
        }

        function returnFileSize(number) 
        {
            if(number < 1024) 
            {
                return number + ' octets';
            } 
            else if(number >= 1024 && number < 1048576) 
            {
                return (number/1024).toFixed(1) + ' Ko';
            } 
            else if(number >= 1048576) 
            {
                return (number/1048576).toFixed(1) + ' Mo';
            }
        }

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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18240411185fe7426c25db06_07966060', "script", $this->tplIndex);
?>

<?php
}
}
/* {/block "output_area"} */
}
