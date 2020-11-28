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
                    <input class="champs" type="text" name="titre" required placeholder="Paris 15 Studio Balcon"/>
                </div>
                <div>
                    <label for="type"><i class="fas fa-home"></i></i> Type : </label>
                    <select class="champs">      
                        <option disabled selected>Veuillez choisir un type</option>              
                        <option value="T1">T1</option>
                        <option value="T2">T2</option>
                        <option value="T3">T3</option>
                        <option value="T4">T4</option>
                        <option value="T5">T5</option>
                        <option value="T6">T6</option>
                    </select>
                </div>
                <div>
                    <label for="loyer"><i class="fas fa-money-check-alt"></i> Loyer : </label>
                    <input class="champs" type="text" name="loyer" required placeholder="600.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
                    <span class="input-icon-end">€</span>
                </div>
                <div>
                    <label for="charges"><i class="fas fa-euro-sign"></i> Charges : </label>
                    <input class="champs" type="text" name="charges" required placeholder="50.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
                    <span class="input-icon-end">€</span>
                </div>
                <div>
                    <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                    <input class="champs" type="text" name="chauffage" required placeholder="individuel" pattern="(individuel|collectif)"/>
                </div>
                <div>
                    <label for="superficie"><i class="fas fa-tape"></i> Superficie : </label>
                    <input class="champs" type="text" name="superficie" required placeholder="100m²" pattern="[0-9]*"/>
                    <span class="input-icon-end" style="margin-left: -3rem;">m²</span>
                </div>
            </div>
            <hr class="ligne-footer">
            <div class="Description">
                <p class="h6-like">Description : </p>
                <textarea class="text-description" required placeholder="Tapez ici votre description" rows="10" cols="80"></textarea>
                
            </div>
            <hr class="ligne-footer">
            <div class="localisation div-input">
                <p class="h6-like">Localisation</p>
                <div>
                   <label for="adresse">Adresse : </label>
                    <input class="champs" type="text" name="adresse" required placeholder="15 rue des Champs Élysées" pattern="[0-9]*\ .*\ .*"/>
                </div>
                <div class="flex-container">
                    <div class="w30">
                        <label for="ville" class="label-cp">Ville : </label>
                        <input class="champs champs-cp" type="text" name="ville" required placeholder="Paris"/>
                    </div>
                    <div class="w60">
                        <label for="code-postal" class="label-cp">Code Postal : </label>
                        <input class="champs champs-cp" type="text" name="code-postal" required placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"/>
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