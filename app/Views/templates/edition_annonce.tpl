{extends 'main.tpl'}
{block name="titre_onglet"}Editer l'annonce{/block}
{block name="output_area"}
    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center">
            {if isset($error)}
                <h6 style="color:red; font-style:italic;">{$error}</h6>
            {/if}
            {if isset($succes)}
                <h6 style="color:green; font-style:italic;">{$succes}</h6>
            {/if}
            <form class="formulaire" action="/annonce/{block name='action'}update/{$annonce.A_idannonce}{/block}" method="post">
                <div class="txtcenter div-input">
                    <h3 class="txtcenter">{block name="titre_form"}Editer l'annonce{/block}</h3>
                    <div>
                        <label for="titre"> Titre : </label>
                        <input class="champs" type="text" name="titre" required value="{$annonce.A_titre|default:''}" placeholder="Paris 15 Studio Balcon" pattern="..* ..* ..*" oninvalid="this.setCustomValidity('Doit contenir au moins 3 mots')" />
                    </div>
                    <div>
                        <label for="type"><i class="fas fa-home"></i></i> Type : </label>
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
                        <label for="loyer"><i class="fas fa-money-check-alt"></i> Loyer : </label>
                        <input class="champs" type="text" name="loyer" required value="{$annonce.A_cout_loyer|default:''}" placeholder="600.00 €" pattern="{literal}(([0-9]*\.[0-9]{2})|[0-9]*){/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label for="charges"><i class="fas fa-euro-sign"></i> Charges : </label>
                        <input class="champs" type="text" name="charges" required value="{$annonce.A_cout_charges|default:''}" placeholder="50.00 €" pattern="{literal}(([0-9]*\.[0-9]{2})|[0-9]*){/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 99999 et de la forme EE.CC ou EE')" />
                        <span class="input-icon-end">€</span>
                    </div>
                    <div>
                        <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                        <select class="champs" name="chauffage" onchange="chauffageSelectCheck(this);" >                 
                            <option value="individuel" id="chauffageIndOption" {(($annonce.A_type_chauffage==='individuel')?'selected':'')|default:''} >Individuel</option>
                            <option value="collectif" {(($annonce.A_type_chauffage==='collectif')?'selected':'')|default:''} >Collectif</option>
                        </select>
                    </div>
                    <div id="chauffageDivCheck" style="display:{(($annonce.A_type_chauffage==='individuel')?'block':'none')|default:''}";>
                        <label for="chauffage"><i class="fas fa-burn"></i> Type Chauffage : </label>
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
                        <label for="chauffage"><i class="fas fa-burn"></i> <b>Nouveau :</b> </label>
                        <input class="champs" type="text" name="nouv_energie" placeholder="Tapez ici le nouveau type de chauffage" oninvalid="this.setCustomValidity('Veuillez entrez un type de chauffage')" />
                    </div>
                    <div>
                        <label for="charges"><i class="fas fa-bolt"></i> Performance energétique : </label>
                        <input class="champs" type="text" name="perf_energie" required value="{$annonce.A_perf_energie|default:''}" placeholder="200" pattern="{literal}([0-9]{1,3}{/literal}" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 999')" />
                        <span class="input-icon-end" style="margin-left: -9rem;">kWh/m²/an</span>
                    </div>
                    <div>
                        <label for="superficie"><i class="fas fa-tape"></i> Superficie : </label>
                        <input class="champs" type="text" name="superficie" required value="{$annonce.A_superficie|default:''}" placeholder="100m²" pattern="[0-9]*" oninvalid="this.setCustomValidity('Doit être un compris entre 0 et 9999')" />
                        <span class="input-icon-end" style="margin-left: -3rem;">m²</span>
                    </div>
                    <div>
                        <label for="meuble"><i class="fas fa-couch"></i> Meublé : </label>
                        <select class="champs" name="meuble">                 
                            <option value="estMeuble" {(($annonce.A_est_meuble)?'selected':'')|default:''} >Oui</option>
                            <option value="nonMeuble" {(($annonce.A_est_meuble)?'':'selected')|default:''} >Non</option>
                        </select>
                    </div>
                </div>
                <hr class="ligne-footer">
                <div class="Description">
                    <p class="h6-like">Description : </p>
                    <textarea class="text-description" name="description" required placeholder="Tapez ici votre description" rows="10" cols="80">{$annonce.A_description|default:''}</textarea>
                    
                </div>
                <hr class="ligne-footer">
                <div class="localisation div-input">
                    <p class="h6-like">Localisation</p>
                    <div>
                    <label for="adresse">Adresse : </label>
                        <input class="champs" type="text" name="adresse" required value="{$annonce.A_adresse|default:''}" placeholder="15 rue des Champs Élysées" pattern="{literal}[0-9]{1,} ..* ..*{/literal}"  oninvalid="this.setCustomValidity('Doit contenir le numéro puis 2 mots')" />
                    </div>
                    <div class="flex-container">
                        <div class="w50">
                            <label for="ville" class="label-cp">Ville : </label>
                            <input class="champs champs-cp" type="text" name="ville" value="{$annonce.A_ville|default:''}" required placeholder="Paris"/>
                        </div>
                        <div class="w50">
                            <label for="cp" class="label-cp">Code Postal : </label>
                            <input class="champs champs-cp" type="text" name="cp" value="{$annonce.A_CP|default:''}" required placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"  oninvalid="this.setCustomValidity('5 chiffres')" />
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

    <script>
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
    </script>  
{/block}