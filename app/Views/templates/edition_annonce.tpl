{extends 'main.tpl'}
{block name="output_area"}
    <div class="flex-container w75 item-center">
        <div class="annonce-container w60 item-center">
            <h3 class="txt-center">Editer l'annonce</h3>
            <div>
                <label for="titre">Titre : </label>
                <input class="input-form" type="text" name="titre" required placeholder="Paris 15 Studio Balcon"/>
            </div>
            <div>
                <label for="type">Type : </label>
                <input class="input-form" type="text" name="type" required placeholder="T2" pattern="T[1-6]" />
            </div>
            <div>
                <label for="loyer">Loyer : </label>
                <input class="input-form" type="text" name="loyer" required placeholder="600.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
            </div>
            <div>
                <label for="charges">Charges : </label>
                <input class="input-form" type="text" name="charges" required placeholder="50.00 €" pattern="{literal}[0-9]*\.[0-9]{2}{/literal}"/>
            </div>
            <div>
                <label for="chauffage">Chauffage : </label>
                <input class="input-form" type="text" name="chauffage" required placeholder="individuel" pattern="(individuel|collectif)"/>
            </div>
            <div>
                <label for="superficie">Superficie : </label>
                <input class="input-form" type="text" name="superficie" required placeholder="100m²" pattern="[0-9]*"/>
            </div>
            <hr class="ligne-footer">
            <div class="Description">
                <p class="h6-like">Description : </p>
                <textarea required placeholder="Tapez ici votre description" rows="10" cols="80">
                </textarea>
                
            </div>
            <hr class="ligne-footer">
            <div class="localisation">
                <p class="h6-like">Localisation</p>
                <div>
                   <label for="adresse">Adresse : </label>
                    <input class="input-form" type="text" name="adresse" required placeholder="15 rue des Champs Élysées" pattern="[0-9]*\ .*\ .*"/>
                </div>
                <div>
                    <label for="ville">Ville : </label>
                    <input class="input-form" type="text" name="ville" required placeholder="Paris"/>
                    <label for="code-postal">Code Postal : </label>
                    <input class="input-form" type="text" name="code-postal" required placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"/>
                </div>
            </div>
            <div>
                <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
                <input class="btn--danger" type="reset" value="Effacer"/>
            </div>
        </div>
    </div>
{/block}