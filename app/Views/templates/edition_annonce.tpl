{extends 'main.tpl'}
{block name="titre_onglet"}Editer l'annonce{/block}
{block name="output_area"}
    <div class="flex-container w75 item-center">
        <div class="annonce-container formulaire w60 item-center">
            <form class="formulaire">
            <div class="txtcenter div-input">
                <h3 class="txtcenter">Editer l'annonce</h3>
                <div>
                    <label for="titre"> Titre : </label>
                    <input class="champs" type="text" name="titre" required value="{$annonce.titre|default:''}" placeholder="Paris 15 Studio Balcon"/>
                </div>
                <div>
                    <label for="type"><i class="fas fa-home"></i></i> Type : </label>
                    <select class="champs" name="type">                  
                        <option value="T1" {$annonce.T1|default:'selected'} >T1</option>
                        <option value="T2" {$annonce.T2|default:''} >T2</option>
                        <option value="T3" {$annonce.T3|default:''} >T3</option>
                        <option value="T4" {$annonce.T4|default:''} >T4</option>
                        <option value="T5" {$annonce.T5|default:''} >T5</option>
                        <option value="T6" {$annonce.T6|default:''} >T6</option>
                    </select> 
                </div>
                <div>
                    <label for="loyer"><i class="fas fa-money-check-alt"></i> Loyer : </label>
                    <input class="champs" type="text" name="loyer" required value="{$annonce.loyer|default:''}" placeholder="600.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
                    <span class="input-icon-end">€</span>
                </div>
                <div>
                    <label for="charges"><i class="fas fa-euro-sign"></i> Charges : </label>
                    <input class="champs" type="text" name="charges" required value="{$annonce.charges|default:''}" placeholder="50.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
                    <span class="input-icon-end">€</span>
                </div>
                <div>
                    <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                    <select class="champs" name="chauffage">                  
                        <option value="individuel" {$annonce.individuel|default:'selected'} >Individuel</option>
                        <option value="collectif" {$annonce.collectif|default:''} >Collectif</option>
                    </select>
                </div>
                <div>
                    <label for="superficie"><i class="fas fa-tape"></i> Superficie : </label>
                    <input class="champs" type="text" name="superficie" required value="{$annonce.superficie|default:''}" placeholder="100m²" pattern="[0-9]*"/>
                    <span class="input-icon-end" style="margin-left: -3rem;">m²</span>
                </div>
            </div>
            <hr class="ligne-footer">
            <div class="Description">
                <p class="h6-like">Description : </p>
                <textarea class="text-description" required value="{$annonce.description|default:''}" placeholder="Tapez ici votre description" rows="10" cols="80"></textarea>
            </div>
            <hr class="ligne-footer">
            <div class="localisation div-input">
                <p class="h6-like">Localisation</p>
                <div>
                   <label for="adresse">Adresse : </label>
                    <input class="champs" type="text" name="adresse" required value="{$annonce.adresse|default:''}" placeholder="15 rue des Champs Élysées" pattern="[0-9]*\ .*\ .*"/>
                </div>
                <div class="flex-container">
                    <div class="w30">
                        <label for="ville" class="label-cp">Ville : </label>
                        <input class="champs champs-cp" type="text" name="ville" required value="{$annonce.ville|default:''}" placeholder="Paris"/>
                    </div>
                    <div class="w60">
                        <label for="cp" class="label-cp">Code Postal : </label>
                        <input class="champs champs-cp" type="text" name="cp" required value="{$annonce.cp|default:''}" placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"/>
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
{/block}