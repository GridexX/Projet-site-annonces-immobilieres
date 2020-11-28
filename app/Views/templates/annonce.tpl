{extends 'main.tpl'}
{block name="output_area"}
    
    <div class="flex-container w75 item-center">
        <div class="annonce-container w60 item-center">
            <div class="img-annonce">
                <div class="flex-container item-center">
                    <div class="slider">                        
                        <input type="radio" id="i1" name="images" checked />
                        <input type="radio" id="i2" name="images" />
                        <input type="radio" id="i3" name="images" />
                        <input type="radio" id="i4" name="images" />
                        <input type="radio" id="i5" name="images" />                       
                        <div class="slide_img" id="one">                                
                                <img src="/Images/logo_house.png">                                
                                    <label class="prev" for="i5"><span>&#x2039;</span></label>
                                    <label class="next" for="i2"><span>&#x203a;</span></label>	                            
                        </div>                        
                        <div class="slide_img" id="two">                            
                                <img src="/Images/logo_site.png" >                                
                                    <label class="prev" for="i1"><span>&#x2039;</span></label>
                                    <label class="next" for="i3"><span>&#x203a;</span></label>                            
                        </div>                                
                        <div class="slide_img" id="three">
                                <img src="/Images/logo_house.png">	                                
                                    <label class="prev" for="i2"><span>&#x2039;</span></label>
                                    <label class="next" for="i4"><span>&#x203a;</span></label>
                        </div>
                        <div class="slide_img" id="four">
                                <img src="/Images/logo_site.png">                                
                                    <label class="prev" for="i3"><span>&#x2039;</span></label>
                                    <label class="next" for="i5"><span>&#x203a;</span></label>
                        </div>
                        <div class="slide_img" id="five">
                                <img src="/Images/logo_house.png">                                
                                    <label class="prev" for="i4"><span>&#x2039;</span></label>
                                    <label class="next" for="i1"><span>&#x203a;</span></label>
                        </div>
                        <div id="nav_slide">
                            <label for="i1" class="dots" id="dot1"></label>
                            <label for="i2" class="dots" id="dot2"></label>
                            <label for="i3" class="dots" id="dot3"></label>
                            <label for="i4" class="dots" id="dot4"></label>
                            <label for="i5" class="dots" id="dot5"></label>
                        </div>
                            
                    </div>
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