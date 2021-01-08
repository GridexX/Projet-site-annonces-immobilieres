{extends file="accueil.tpl"}
{block name="titre_onglet"}Recherche{/block}
{block name="titre_para"}Résultat de la recherche{/block}
{block name="recherche"}
{*Boutons pour naviguer dans les pages*}


<div class="flex-container w75 item-center">
    <div class="annonce-container formulaire w90 item-center">
        <form method="post" action="/annonce/toutesAnnonces/{$bSelect|default:''}/{$nbAnnonces|default:''}" >
            <div>
                <span><p class="h5-like">Rechercher des annonces</p>
                <label for="titre"> Titre : </label>
                    <input class="champs" type="text" name="A_titre" placeholder="Titre de l'annonce" />
                    <button class="btn--primary" id="submit-button" type="submit" value="Valider" name="recherche"><i class="fas fa-search"></i></button>              
                </span>
                
            </div>
            <hr>
            <div class="flex-container">
            <div class="w50">
            <p class="h6-like slider-title">Fourchette loyer : </p>
            
              
            <!-- Range Slider HTML -->
            <div>
                  <div slider id="slider-distance" class="w90">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$borne.min_A_cout_loyer} €</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$borne.max_A_cout_loyer} €</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="min_A_cout_loyer" value="{$borne.min_A_cout_loyer}" max="{$borne.max_A_cout_loyer}" min="{$borne.min_A_cout_loyer}" step="10" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' €';" />

                    <input type="range" tabindex="0" name="max_A_cout_loyer" value="{$borne.max_A_cout_loyer}" max="{$borne.max_A_cout_loyer}" min="{$borne.min_A_cout_loyer}" step="10" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' €';" />
                    </div>
                  <!-- End Range Slider HTML -->
    		</div>
            </div>
            <div class="w50">
            <p class="h6-like slider-title">Fourchette charges : </p>
            
              
            <!-- Range Slider HTML -->
                  <div slider id="slider-distance">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$borne.min_A_cout_charges} €</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$borne.max_A_cout_charges} €</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="min_A_cout_charges" value="{$borne.min_A_cout_charges}" max="{$borne.max_A_cout_charges}" min="{$borne.min_A_cout_charges}" step="5" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' €';" />

                    <input type="range" tabindex="0" name="max_A_cout_charges" value="{$borne.max_A_cout_charges}" max="{$borne.max_A_cout_charges}" min="{$borne.min_A_cout_charges}" step="5" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' €';" />
                    </div>
                  <!-- End Range Slider HTML -->
            </div>

            <div class="w50">
            <p class="h6-like slider-title">Fourchette superficie : </p>
            
              
            <!-- Range Slider HTML -->
                  <div slider id="slider-distance" class="w90">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$borne.min_A_superficie} m²</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$borne.max_A_superficie} m²</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="min_A_superficie" value="{$borne.min_A_superficie}" max="{$borne.max_A_superficie}" min="{$borne.min_A_superficie}" step="1" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' m²';" />

                    <input type="range" tabindex="0" name="max_A_superficie" value="{$borne.max_A_superficie}" max="{$borne.max_A_superficie}" min="{$borne.min_A_superficie}" step="1" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' m²';" />
                    </div>
                  <!-- End Range Slider HTML -->
            </div>
            <div class="w50">
            <p class="h6-like slider-title">Fourchette énergie : </p>
            
              
            <!-- Range Slider HTML -->
                  <div slider id="slider-distance">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range id="range" style="left:0%;right:0%;background:linear-gradient(to right, rgb(0,150,65),rgb(228,15,27));"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;background-color:#009641">
                        <span id="value">A</span>
                        </div>
                        <div sign style="left:100%;background-color:#e40f1b">
                        <span id="value">G</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="min_A_perf_energie" value="0" max="6" min="0" step="0" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=String.fromCharCode(parseInt(this.value)+65);
                    children[11].style.backgroundColor=tabColor2[parseInt(this.value)];
                    bgGradient(0, tabColor2[parseInt(this.value)]);" />

                    <input type="range" tabindex="0" name="max_A_perf_energie" value="6" max="6" min="0" step="0" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=String.fromCharCode(parseInt(this.value)+65);
                    children[13].style.backgroundColor=tabColor2[parseInt(this.value)];
                    bgGradient(1, tabColor2[parseInt(this.value)]);" />
                    </div>
                  <!-- End Range Slider HTML -->
            </div>
            </div>
            <div class="flex-container ">
                <div class="w50 center">
                    <label for="meuble"><i class="fas fa-couch"></i> Meublé : </label>
                    <select class="champs" name="A_est_meuble">                 
                        <option value="TRUE" {(($recherche.A_est_meuble)?'selected':'')|default:''} >Oui</option>
                        <option value="FALSE" {(($recherche.A_est_meuble)?'':'selected')|default:''} >Non</option>
                        <option value="indifférent" {( !isset($recherche.A_est_meuble) || $recherche.A_est_meuble==='indifférent')?'selected':''}>Indifférent</option>     
                    </select>
                </div>
                <div class="w50">
                    <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                    <select class="champs" name="A_type_chauffage" onchange="chauffageSelectCheck(this);" > 
                        <option value="indifférent" {(isset($recherche.A_type_chauffage))?'':'selected'}>Indifférent</option>                
                        <option value="individuel" id="chauffageIndOption" {(($recherche.A_type_chauffage==='individuel')?'selected':'')|default:''} >Individuel</option>
                        <option value="collectif" {(($recherche.A_type_chauffage==='collectif')?'selected':'')|default:''} >Collectif</option>
                    </select>
                </div>
                <div class="w50">
                <div id="chauffageDivCheck" style="display: {($recherche.A_type_chauffage==='individuel')?'block;':'none;'}" >
                        <label for="chauffage"><i class="fas fa-burn"></i> Type Chauffage : </label>
                        <select class="champs" name="E_id_engie" onchange="engieSelectCheck(this);" >   
                            {if isset($energie)}
                            {foreach from=$energie item=i }
                                <option value="{$i.E_id_engie}" {(($recherche.E_id_engie===$i.E_id_engie)?'selected':'')|default:''} >{$i.E_description}</option>
                            {/foreach}  
                            {/if}
                            <option value="indifférent" {( !isset($recherche.E_id_engie) || $recherche.E_id_engie==='indifférent')?'selected':''}>Indifférent</option>     
                              
                        </select>
                       
                </div>
                </div>
                
            </div>
            <div class="flex-container ">
                <div class="w50">
                 <label for="type"><i class="fas fa-home"></i></i> Type : </label>
                        <select class="champs" name="T_type">                 
                            <option value="T1" {(($recherche.T_type==='T1')?'selected':'')|default:''}>T1</option>
                            <option value="T2" {(($recherche.T_type==='T2')?'selected':'')|default:''}>T2</option>
                            <option value="T3" {(($recherche.T_type==='T3')?'selected':'')|default:''}>T3</option>
                            <option value="T4" {(($recherche.T_type==='T4')?'selected':'')|default:''}>T4</option>
                            <option value="T5" {(($recherche.T_type==='T5')?'selected':'')|default:''}>T5</option>
                            <option value="T6" {(($recherche.T_type==='T6')?'selected':'')|default:''}>T6</option>
                            <option value="indifférent" {(empty($recherche.T_type) || $recherche.T_type==='indifférent')?'selected':''}>Indifférent</option>
                        </select>
                </div>
                <div class="w50">
                    <label for="ville" class="label-cp">Ville : </label>
                    <input class="champs champs-cp" type="text" name="A_ville" value="{$recherche.A_ville|default:''}" placeholder="Paris"/>
                        
                </div>
                <div class="w50">
                    <label for="cp" class="label-cp">Code Postal : </label>
                    <input class="champs champs-cp" type="text" name="A_CP" value="{$recherche.A_CP|default:''}" placeholder="75000" pattern="[0-9]{literal}{5}{/literal}"  oninvalid="this.setCustomValidity('5 chiffres')" />
                        
                </div>
            </div>
            <hr>
            {if isset($lBoutons)}
<div class="flex-container w75 center">
    {foreach from=$lBoutons item=bouton}
        <a href="/annonce/toutesAnnonces/{$bouton.numAnnDeb}/{$nbAnnonces}"><button class="bouton {($bSelect>=$bouton.numAnnDeb && $bSelect<$bouton.numAnnFin) ? 'btn-green' : 'btn-bleu' } center">{$bouton.numPage+1}</button></a>
    {/foreach}
    <select onchange="location = this.value;">
        <option default>Afficher {$nbAnnonces} annonces par pages</option>
        <option value="/annonce/viewListe/{$bSelect}/15">15 </option>
        {if {$var.totAnnonce}>30}<option value="/annonce/viewListe/{$bSelect}/30">30 </option>{/if}
        {if {$var.totAnnonce}>50}<option value="/annonce/viewListe/{$bSelect}/50">50 </option>{/if}
        {if {$var.totAnnonce}>100}<option value="/annonce/viewListe/{$bSelect}/100">100</option>{/if}
    </select>
</div>
{/if}
            <div class="txtcenter"><small>{$var.totAnnonceTrouvees} / {$var.totAnnonce} annonce{($var.totAnnonce>1)?'s':''}  au total {$annAff = ($nbAnnonces<$var.totAnnonceTrouvees)?$nbAnnonces:$var.totAnnonceTrouvees}{if $annAff>0}<span style="font-size:1.05rem">( {$annAff} annonce{($annAff>1)?'s':''} affichée{($annAff>1)?'s':''} sur la page)</span>{/if}</small></div>
        </form>
    </div>
</div>
<script>
var tabColor2 = [ 'rgb(0,150,65)', 'rgb(82,174,50)', 'rgb(200,211,0)', 'rgb(255,233,0)', 'rgb(251,186,0)', 'rgb(236,102,8)', 'rgb(228,15,27)'];
var color1 = "rgb(0,150,65)";
var color2 = "rgb(228,15,27)"; 

function getCssValuePrefix()
{
    var rtrnVal = '';//default to standard syntax
    var prefixes = ['-o-', '-ms-', '-moz-', '-webkit-'];

    // Create a temporary DOM object for testing
    var dom = document.createElement('div');

    for (var i = 0; i < prefixes.length; i++)
    {
        // Attempt to set the style
        dom.style.background = prefixes[i] + 'linear-gradient(#000000, #ffffff)';

        // Detect if the style was successfully set
        if (dom.style.background)
        {
            rtrnVal = prefixes[i];
        }
    }

    dom = null;
    delete dom;

    return rtrnVal;
}

function bgGradient(signType, color)
{
    if(signType==0) 
    {
        color1 = color;
    }
    else
    {
        color2 = color;
    }
    document.getElementById("range").style.background = getCssValuePrefix() + 'linear-gradient(to right, green,blue);' ;//"linear-gradient(to right, "+color1+","+color2+");";
    console.log(getCssValuePrefix() +"linear-gradient(to right, "+color1+","+color2+");");
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
                }
            }
            else
            {
                document.getElementById("chauffageDivCheck").style.display = "none";
            }
        }
</script>
{/block}

