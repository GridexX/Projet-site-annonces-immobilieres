{extends 'main.tpl'}
{block name="titre_onglet"}Mail{/block}
{block name="output_area"}
<div class="flex-container">
<div class="w50 center annonce-container">
<h3 class="txtcenter">Envoyer un mail</h3>
    <div class="send right">
      <form action="/messagerie/sendMail/{$uti.U_mail}" method="post" >
        <input name="sujet" type="text" class="msger-input" placeholder="Sujet" required>
        <input name="dest" type="text" class="msger-input" placeholder="Destinataire : {$uti.U_mail}" disabled>
        <textarea name="message" type="text" class="msger-input" placeholder="Entrer votre message" required></textarea>
        <button type="submit" class="msger-send-btn">Envoyer</button>
      </form>
    </div>
  </div>
  </div>
{/block}