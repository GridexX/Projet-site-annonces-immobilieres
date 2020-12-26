{extends 'main.tpl'}
{block name="output_area"}
<div class="liste_msgs">
{foreach from=$convs item=conv}
    <a href="{$conv.lien}" class="msg center w40"> 
        <div class="msg-content">
            <div class="msg-header">{$conv.pseudo} <h6>({$conv.mail})</h6></div>
            <div class="msg-meta">
            <span class="msg-category">{$conv.state}</span>
            </div>
            <div class="msg-description">
                {$conv.title}
            </div>
        </div>
        <div class="msg-extra content">
            <div class="msg-last">
                {$conv.last}
            </div>
        </div>
    </a>
{/foreach}
</div>
{/block}