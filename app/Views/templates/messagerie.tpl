{extends 'main.tpl'}
{block name="output_area"}
<div class="flex-container w75 item-center">
  <div class="messaging center w100">
    <div class="inbox_msg">
            <span class="msg_name_user"> {$user.U_pseudo} ({$user.U_mail}) : {$annonce.A_titre}</span>
      <div class="mesgs">
        <div>
        {foreach from=$messages item=mess}
        {if $mess.U_mail === $user.U_mail}
          <div class="received_msg">
              <p>{$mess.M_texte_message}</p>
              <span class="time_date"> {$mess.M_dateheure_message}</span>
          </div>
        {else}
          <div class="outgoing_msg">
              <p>{$mess.M_texte_message}</p>
              <span class="time_date">{$mess.M_dateheure_message}</span> 
          </div>
        {/if}
        {/foreach}              
        </div>
      </div>
    </div>    
  </div>
  <div class="send right">
      <form action="/messagerie/create/{$annonce.A_idannonce}" method="post" >
        <input name="message" type="text" class="msger-input" placeholder="Enter your message...">
        <button type="submit" class="msger-send-btn">Send</button>
      </form>
  </div>
</div>
{/block}