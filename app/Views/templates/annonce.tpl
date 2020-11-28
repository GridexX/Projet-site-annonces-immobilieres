{extends 'main.tpl'}
{block name="titre_onglet"}Annonce{/block}
{block name="output_area"}
    
    <div class="flex-container w75 item-center">
        <div class="annonce-container w60 item-center">
            <div class="img-annonce">
                <div class="flex-container item-center">
                    <div class="w10 item-center txtcenter">
                        <button class="btn--primary"><i class="icon-arrow--left"></i></button>
                    </div>
                    <span class="item-fluid item-center txtcenter">
                        <img src="/Images/logo_house.png" alt="House logo">
                    </span>
                    <span class="w10 item-center txtcenter">
                        <button class="btn--primary"><i class="icon-arrow--right"></i></button>
                    </span>
                </div>
            </div>
            <div class="txt-annnonce-container">
                <h3 class="titre_annonce">Titre</h3>
                <p class="h6-like"><span class="texte-orange">xxxx€ </span>Charges comprises</p>
                <small><i>Le ... à Xh</i></small>
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
                                <p><b>Paris</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-tape"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Surface : </p>
                                <p><b>100 m²</b></p>
                            </span>
                        </div>
                        <div class="w33  critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-shapes"></i>
                            </div>
                            <span class="w60 txt-critere">
                                <p>Pièces : </p>
                                <p><b>2</b></p>
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
                                <p><b>Non meublé</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w10 right icon-critere">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span class="w90 txt-critere ">
                                <p>Classe énergie : </p>

                                <p>
                                    <span class="critere-energie critere-A">A</span>
                                    <b><span class="critere-energie energie-courante critere-B">B</span></b>
                                    <span class="critere-energie critere-C">C</span>
                                    <span class="critere-energie critere-D">D</span>
                                    <span class="critere-energie critere-E">E</span>
                                    <span class="critere-energie critere-F">F</span>
                                    <span class="critere-energie critere-G">G</span>

                                </p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-burn"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Chauffage :</p>
                                <p><b>Collectif</b></p>
                            </span>
                        </div>
                    </div>
                    
                </div>
                <hr class="ligne-footer">
                <p class="h6-like">Description</p>
                <pre>dazdaz azdazd zad zdaa zdza dazd 
                dzadza
                
                dazdadaz</pre>
                <br><br>
                <hr class="ligne-footer">
            </div>

            <div class="utilisateur_container">
                <p>Utilisateur | <i>Nb annonces : </i></p>
                <button class="btn--primary">
                <i class="fas fa-comments"></i> Envoyer un message
                </button>
            </div>
        </div>
        
    </div>
{/block}