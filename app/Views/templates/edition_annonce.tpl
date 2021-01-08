{extends 'main.tpl'}
{block name="titre_onglet"}Editer l'annonce{/block}
{block name="output_area"}
    {if isset($confirmation)}
        <div class="flex-container w75 item-center">
            <div class="annonce-container formulaire w60 item-center">
                <p>Etes vous sur de vouloir supprimer l'annonce ?</p>

                <a href="/annonce/delete/{$annonce.A_idannonce}/true"><button class="btn--primary" >Oui</button></a>
                <a href="/annonce/view/edition_annonce/{$annonce.A_idannonce}"><button class="btn--danger" >Non</button></a>
                
            </div>
        </div>
    {/if}
    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center">
            {if isset($error)}
                <h6 style="color:red; font-style:italic;">{$error}</h6>
            {/if}
            {if isset($succes)}
                <h6 style="color:green; font-style:italic;">{$succes}</h6>
            {/if} {*action="/annonce/{block name='action'}update/{$annonce.A_idannonce}{/block}*}
            <form id="formEdition" name="formEdition" class="formulaire" action="" method="post" enctype="multipart/form-data" >
                <div class="div-input">
                    <h3 class="txtcenter">{block name="titre_form"}Editer l'annonce{/block}</h3>
                    <div>
                        <label class="label-form" for="titre"> Titre : </label>
                        <input class="champs" type="text" name="titre" required value="{$annonce.A_titre|default:''}" placeholder="Paris 15 Studio Balcon" pattern="..* ..* ..*" oninvalid="this.setCustomValidity('Doit contenir au moins 3 mots')" />
                    </div>
                    <div>
                        <label class="label-form" for="type"><i class="fas fa-home"></i></i> Type : </label>
                        <select class="champs" name="type">                 
                            <option value="T1" {(($annonce.T_type==='T1')?'selected':'')|default:''}>T1</option>
                            <option value="T2" {(($annonce.T_type==='T2')?'selected':'')|default:''}>T2</option>
                            <option value="T3" {(($annonce.T_type==='T3')?'selected':'')|default:''}>T3</option>
                            <option value="T4" {(($annonce.T_type==='T4')?'selected':'')|default:''}>T4</option>
                            <option value="T5" {(($annonce.T_type==='T5')?'selected':'')|default:''}>T5</option>
                            <option value="T6" {(($annonce.T_type==='T6')?'selected':'')|default:''}>T6</option>
                        </select>
                    </div>
                    <div>
                        <label class="label-form" for="loyer"><i class="fas fa-money-check-alt"></i> Loyer : </label>
                        <input class="champs" type="text" name="loyer" required value="{$annonce.A_cout_loyer|default:''}" placeholder="600.00 €" pattern="{literal}(([0-9]*\.[0-9]{2})|[0-9]*){/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label class="label-form" for="charges"><i class="fas fa-euro-sign"></i> Charges : </label>
                        <input class="champs" type="text" name="charges" required value="{$annonce.A_cout_charges|default:''}" placeholder="50.00 €" pattern="{literal}(([0-9]*\.[0-9]{2})|[0-9]*){/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label class="label-form" for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                        <select class="champs" name="chauffage" onchange="chauffageSelectCheck(this);" >                 
                            <option value="individuel" id="chauffageIndOption" {(($annonce.A_type_chauffage==='individuel')?'selected':'')|default:''} >Individuel</option>
                            <option value="collectif" {(($annonce.A_type_chauffage==='collectif')?'selected':'')|default:''} >Collectif</option>
                        </select>
                    </div>
                    <div id="chauffageDivCheck" style="display: {if isset($annonce.A_type_chauffage)} {($annonce.A_type_chauffage==='individuel')?'block;':'none;'} {else}'block;'{/if} " >
                        <label class="label-form" for="chauffage"><i class="fas fa-burn"></i> Type Chauffage : </label>
                        <select class="champs" name="engie" onchange="engieSelectCheck(this);" >   
                            {if isset($energie)}
                            {foreach from=$energie item=i }
                                <option value="{$i.E_id_engie}" {(($annonce.E_id_engie===$i.E_id_engie)?'selected':'')|default:''} >{$i.E_description}</option>
                            {/foreach}  
                            {/if}
                            <option id="autreTypeChauffage" value="autreTypeChauffage">Ajouter un autre type de chauffage</option>         
                        </select>
                    </div>
                    <div id="typeChauffageDivCheck" style="display:none;">
                        <label class="label-form" for="chauffage"><i class="fas fa-burn"></i> <b>Nouveau :</b> </label>
                        <input class="champs" type="text" name="nouv_energie" placeholder="Tapez ici le nouveau type de chauffage" oninvalid="this.setCustomValidity('Veuillez entrez un type de chauffage')" />
                    </div>
                    <div>
                        <label class="label-form" for="charges"><i class="fas fa-bolt"></i> Performance energétique : </label>
                        <input class="champs" type="text" name="perf_energie" required value="{$annonce.A_perf_energie|default:''}" placeholder="200" pattern="{literal}([0-9]{1,3}{/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 999')" />
                        <span class="input-icon-end" style="margin-left: -9rem;">kWh/m²/an</span>
                    </div>
                    <div>
                        <label class="label-form" for="superficie"><i class="fas fa-tape"></i> Superficie : </label>
                        <input class="champs" type="text" name="superficie" required value="{$annonce.A_superficie|default:''}" placeholder="100m²" pattern="[0-9]*" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 9999')" />
                        <span class="input-icon-end" style="margin-left: -3rem;">m²</span>
                    </div>
                    <div>
                        <label class="label-form" for="meuble"><i class="fas fa-couch"></i> Meublé : </label>
                        <select class="champs" name="meuble">                 
                            <option value="estMeuble" {(($annonce.A_est_meuble)?'selected':'')|default:''} >Oui</option>
                            <option value="nonMeuble" {(($annonce.A_est_meuble)?'':'selected')|default:''} >Non</option>
                        </select>
                    </div>
                </div>
                <hr class="ligne-footer">
                <div class="Photos">
                    <p class="h6-like">Photos : </p>
                        <div id="change-photos">
                            <div class="flex-container txt-centrer w100">
                            {if isset($liste_photo)}
                            {foreach from=$liste_photo item=photo}
                                <div class="w{$taille_div}">
                                
                                <img src='/uploads/{$annonce.A_idannonce}/{$photo.P_titre}' alt="{$photo.P_nom}" />
                                
                                </div>
                            {/foreach}
                            {else}
                               <p style="color:red">Veuillez insérer des photos</p> 
                            {/if}
                            </div>
                            <label class="btn--success label-form" for="changer les photos de lannonce" onclick="javascript:showInputButton()" >Changer les photos</label>
                        </div>
                        <div id="obj-photos">
                        <label class="label-form btn--success" for="image_uploads" style="width:auto;">Sélectionner des images à uploader (PNG, JPG)</label>
                        
                        <input class="champs" type="file" id="image_uploads" style="cursor:default;" name="images[]" accept=".jpg, .jpeg, .png" multiple value="Sélectionner des images à uploader (PNG, JPG)" >

                        <div class="preview flex-container item-center txt-center">
                            <div class="w90 item-center txt-center">
                                <p style="color:red">Veuillez insérer des photos</p> 
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="ligne-footer">
                <div class="Description">
                    <p class="h6-like">Description : </p>
                    <textarea class="text-description champs" name="description" required placeholder="Tapez ici votre description" rows="10" cols="80">{$annonce.A_description|default:''}</textarea>    
                </div>
                <hr class="ligne-footer">
                <div class="localisation div-input">
                    <p class="h6-like">Localisation</p>
                    <div>
                        <label class="label-form label-cp" for="adresse"><i class="fas fa-map-marked-alt"></i> Adresse : </label>
                        <input class=" champs" type="text" name="adresse" required value="{$annonce.A_adresse|default:''}" placeholder="15 rue des Champs Élysées" oninvalid="this.setCustomValidity('Ne doit pas être vide')" />
                    </div>
                    <div>
                        <label for="ville" class="label-cp label-form"><i class="fas fa-city"></i> Ville : </label>
                        <input class="champs" type="text" name="ville" value="{$annonce.A_ville|default:''}" required placeholder="Paris"/>
                    </div>
                    <div>
                        <label for="cp" class="label-form label-cp"><i class="fas fa-sign"></i> Code Postal : </label>
                        <input class="champs " type="text" name="cp" value="{$annonce.A_CP|default:''}" required placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"  oninvalid="this.setCustomValidity('5 chiffres')" />
                    </div>
                </div>
                <div>
                    <input class="btn--primary" id="submit-button" type="submit" value="Valider" name="inscription" />
                    <input class="btn--danger" type="reset" value="Effacer"/>
                </div>
            </form>

        </div>
    </div> 
    {if isset($annonce.A_idannonce) && !isset($confirmation)}
    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center txtcenter">   

            <form class="formulaire" action="/annonce/delete/{$annonce.A_idannonce}" method="post"  >
                <input class="btn--dark" id="submit-button" type="submit" value="Supprimer l'annonce" name="suppression" />
            </form>

        </div>
    </div>
    {/if}
    <script>
        document.formEdition.action = "/annonce/update/{$annonce.A_idannonce|default:''}";
        document.getElementById('submit-button').disabled = true;
        var input = document.querySelector('#image_uploads');
        var preview = document.querySelector('.preview');
        document.getElementById("obj-photos").style.display = "none";
        input.style.opacity = 0;

        input.addEventListener('change', updateImageDisplay);

        function showInputButton()
        {
            document.formEdition.action = "/annonce/update/{$annonce.A_idannonce|default:''}/true";
            document.getElementById("obj-photos").style.display = "block";
            document.getElementById("change-photos").style.display = "none";
            document.getElementById('submit-button').disabled = true;
        }

        function updateImageDisplay() 
        {
            
            while(preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            var curFiles = input.files;
            if(curFiles.length === 0) 
            {
                var para = document.createElement('p');
                para.textContent = 'Pas encore d\'images de sélectionnées';
                preview.appendChild(para);
                document.getElementById('submit-button').disabled = true;
            } 
            else
            {
                var list = document.createElement('ol');
                preview.appendChild(list);
                document.getElementById('submit-button').disabled = false;
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
                    var para = document.createElement('p');
                    document.getElementById('submit-button').disabled = true;
                    div.classList.add("notif-container");

                    div.classList.add("error");


                    para.textContent = "Vous avez inséré trop de photos, veuillez en enlever";
                    

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

    
    //désactivation des champs du formulaire si admin
    {if isset($adminNoModif)}
    var inputsChamps = document.getElementsByClassName("champs");
    for(var i=0; i<inputsChamps.length ; ++i)
    {
        inputsChamps[i].disabled = true;
    }
    doc
    {/if}
    document.getElementById('submit-button').disabled = false;
    </script>  
    {block name="script"}{/block}
{/block}
