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
                <h3 class="titre_annonce">{$annonce.A_titre}</h3>
                <p class="h6-like"><span class="texte-orange">{$annonce.A_cout_loyer+$annonce.A_cout_charges}€ </span>Charges comprises</p>
                <small><i>Le {$dateFormat}</i></small>
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
                                <p><b>{$annonce.A_adresse} {$annonce.A_ville} {$annonce.A_CP}</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-tape"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Surface : </p>
                                <p><b>{$annonce.A_superficie} m²</b></p>
                            </span>
                        </div>
                        <div class="w33  critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-shapes"></i>
                            </div>
                            <span class="w60 txt-critere">
                                <p>Pièces : </p>
                                <p><b>{$annonce.T_type|substr:1:2}</b></p>
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
                                <p><b>{($annonce.A_est_meuble)?'Meublé':'Non Meublé'}</b></p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w10 right icon-critere">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span class="w90 txt-critere ">
                                <p>Classe énergie : </p>

                                <p>
                                    <span class="critere-energie {if $annonce.A_perf_energie le 50 } energie-courante {/if} critere-A">A</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 51 && $annonce.A_perf_energie le 90} energie-courante {/if} critere-B">B</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 91 && $annonce.A_perf_energie le 150} energie-courante {/if} critere-C">C</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 151 && $annonce.A_perf_energie le 230} energie-courante {/if} critere-D">D</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 231 && $annonce.A_perf_energie le 330} energie-courante {/if} critere-E">E</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 331 && $annonce.A_perf_energie le 450} energie-courante {/if} critere-F">F</span>
                                    <span class="critere-energie {if $annonce.A_perf_energie ge 451 } energie-courante {/if} critere-G">G</span>

                                </p>
                            </span>
                        </div>
                        <div class="w33 critere-annonce flex-container">
                            <div class="w20 right icon-critere">
                                <i class="fas fa-burn"></i>
                            </div>
                            <span class="w80 txt-critere">
                                <p>Chauffage :</p>
                                <p><b>{$annonce.A_type_chauffage|capitalize}</b></p>
                            </span>
                        </div>
                    </div>
                    
                </div>
                <hr class="ligne-footer">
                <p class="h6-like">Description</p>
                <pre>{$annonce.A_description}</pre>
                <br><br>
                <hr class="ligne-footer">
            </div>

            <div class="utilisateur_container">
                {*Si l'annonce appartient à l'utilisateur il peut l'éditer*}
                {if isset($smarty.session.mail) && $smarty.session.mail===$annonce.U_mail}
                    <a href="/annonce/view/edition_annonce/{$annonce.A_idannonce}"><button class="btn--primary"><i class="fas fa-comments"></i> Editer l'annonce</button></a>
                {else}{*Sinon on propose de prendre contact avec le propriétaire*}
                    <p>{$proprio.U_pseudo} | <i>Nb annonces : </i></p>
                <button class="btn--primary"><i class="fas fa-comments"></i> Envoyer un message</button>
                {/if}
            </div>
        </div>
        
    </div>
{/block}