<div class="flex-container w75 item-center">
    <div class="annonce-container formulaire w60 item-center">
        <form method="post" action="/annonce/viewListe/{$bSelect}/{$nbAnnonces}" >
            <div>
                <span><p class="h5-like">Rechercher des annonces</p>
                    <input class="champs" type="text" placeholder="Titre de l'recherche" />
                    <button class="btn--primary" id="submit-button" type="submit" value="Valider" name="recherche"><i class="fas fa-search"></i></button>              
                </span>
                
            </div>
            <hr>
            <div class="flex-container ">
            <span class="w10 item-center"><p class="h6-like">Fourchette Loyer : </p></span>
            
              
            <!-- Range Slider HTML -->
            <span class="w40">
                  <div slider id="slider-distance" class="w90">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$recherche.min_loyer|default:$recherche.valeur_min_loyer} €</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$recherche.max_loyer|default:$recherche.valeur_max_loyer} €</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="minLoyer" value="{$recherche.min_loyer|default:$recherche.valeur_min_loyer}" max="{$recherche.valeur_max_loyer}" min="{$recherche.valeur_min_loyer}" step="10" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' €';" />

                    <input type="range" tabindex="0" name="maxLoyer" value="{$recherche.max_loyer|default:$recherche.valeur_max_loyer}" max="{$recherche.valeur_max_loyer}" min="{$recherche.valeur_min_loyer}" step="10" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' €';" />
                    </div>
                  <!-- End Range Slider HTML -->
    		</span>
            <span class="w10 item-center"><p class="h6-like">Fourchette Charges : </p></span>
            
              
            <!-- Range Slider HTML -->
            <span class="w40">
                  <div slider id="slider-distance">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$recherche.min_charges|default:$recherche.valeur_min_charges} €</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$recherche.max_charges|default:$recherche.valeur_max_charges} €</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="minCharges" value="{$recherche.min_charges|default:$recherche.valeur_min_charges}" max="{$recherche.max_charges|default:$recherche.valeur_max_charges}" min="{$recherche.valeur_min_charges}" step="5" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' €';" />

                    <input type="range" tabindex="0" name="maxCharges" value="{$recherche.max_charges|default:$recherche.valeur_max_charges}" max="{$recherche.max_charges|default:$recherche.valeur_max_charges}" min="{$recherche.valeur_min_charges}" step="5" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' €';" />
                    </div>
                  <!-- End Range Slider HTML -->
    		</span>
            </div>

            <div class="flex-container ">
            <span class="w10 item-center"><p class="h6-like">Fourchette Surface : </p></span>
            
              
            <!-- Range Slider HTML -->
            <span class="w40">
                  <div slider id="slider-distance" class="w90">
                    <div>
                        <div inverse-left style="width:70%;"></div>
                        <div inverse-right style="width:70%;"></div>
                        <div range style="left:0%;right:0%;"></div>
                        <span thumb style="left:0%;"></span>
                        <span thumb style="left:100%;"></span>
                        <div sign style="left:0%;">
                        <span id="value">{$recherche.min_surface|default:$recherche.valeur_min_surface} m²</span>
                        </div>
                        <div sign style="left:100%;">
                        <span id="value">{$recherche.max_surface|default:$recherche.valeur_max_surface} m²</span>
                        </div>
                    </div>
                    <input type="range" tabindex="0" name="minSurface" value="{$recherche.min_surface|default:$recherche.valeur_min_surface}" max="{$recherche.max_surface|default:$recherche.valeur_max_surface}" min="{$recherche.valeur_min_surface}" step="1" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=this.value+' m²';" />

                    <input type="range" tabindex="0" name="maxSurface" value="{$recherche.max_surface|default:$recherche.valeur_max_surface}" max="{$recherche.max_surface|default:$recherche.valeur_max_surface}" min="{$recherche.valeur_min_surface}" step="1" oninput="
                    this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[3].style.width=(100-value)+'%';
                    children[5].style.right=(100-value)+'%';
                    children[9].style.left=value+'%';children[13].style.left=value+'%';
                    children[13].childNodes[1].innerHTML=this.value+' m²';" />
                    </div>
                  <!-- End Range Slider HTML -->
    		</span>
            
            <span class="w10 item-center"><p class="h6-like">Fourchette Energie : </p></span>
            
              
            <!-- Range Slider HTML -->
            <span class="w40">
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
                    <input type="range" tabindex="0" name="minSurface" value="0" max="6" min="0" step="0" oninput="
                    this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                    var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
                    var children = this.parentNode.childNodes[1].childNodes;
                    children[1].style.width=value+'%';
                    children[5].style.left=value+'%';
                    children[7].style.left=value+'%';children[11].style.left=value+'%';
                    children[11].childNodes[1].innerHTML=String.fromCharCode(parseInt(this.value)+65);
                    children[11].style.backgroundColor=tabColor2[parseInt(this.value)];
                    bgGradient(0, tabColor2[parseInt(this.value)]);" />

                    <input type="range" tabindex="0" name="maxSurface" value="6" max="6" min="0" step="0" oninput="
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
    		</span>

            </div>
            <div class="flex-container">
                <span class="w33">
                    <label for="meuble"><i class="fas fa-couch"></i> Meublé : </label>
                    <select class="champs" name="meuble">                 
                        <option value="estMeuble" {(($recherche.A_est_meuble)?'selected':'')|default:''} >Oui</option>
                        <option value="nonMeuble" {(($recherche.A_est_meuble)?'':'selected')|default:''} >Non</option>
                        <option value="indifférent" {( !isset($recherche.A_est_meuble) || $recherche.A_est_meuble==='indifférent')?'selected':''}>Indifférent</option>     
                    </select>
                </span>
                <span class="w33">
                    <label for="chauffage"><i class="fas fa-burn"></i> Chauffage : </label>
                    <select class="champs" name="chauffage" onchange="chauffageSelectCheck(this);" > 
                        <option value="indifférent" {(isset($recherche.A_type_chauffage))?'':'selected'}>Indifférent</option>                
                        <option value="individuel" id="chauffageIndOption" {(($recherche.A_type_chauffage==='individuel')?'selected':'')|default:''} >Individuel</option>
                        <option value="collectif" {(($recherche.A_type_chauffage==='collectif')?'selected':'')|default:''} >Collectif</option>
                    </select>
                </span>
                <span class="w33">
                <div id="chauffageDivCheck" style="display: {($recherche.A_type_chauffage==='individuel')?'block;':'none;'}" >
                        <label for="chauffage"><i class="fas fa-burn"></i> Type Chauffage : </label>
                        <select class="champs" name="engie" onchange="engieSelectCheck(this);" >   
                            {if isset($energie)}
                            {foreach from=$energie item=i }
                                <option value="{$i.E_id_engie}" {(($recherche.E_id_engie===$i.E_id_engie)?'selected':'')|default:''} >{$i.E_description}</option>
                            {/foreach}  
                            {/if}
                            <option value="indifférent" {( !isset($recherche.E_id_engie) || $recherche.E_id_engie==='indifférent')?'selected':''}>Indifférent</option>     
                              
                        </select>
                       
                </div>
                </span>
                
            </div>
            <div>

            </div>
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
    document.getElementById("range").style.backgroundImage = getCssValuePrefix() + 'linear-gradient(to right, green,blue);' ;//"linear-gradient(to right, "+color1+","+color2+");";
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