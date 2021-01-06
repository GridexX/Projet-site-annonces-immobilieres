{extends 'edition_annonce.tpl'}
{block name="titre_onglet"}Creer annonce{/block}
{block name="titre_form"}Poster une annonce{/block}
{block name='action'}create{/block}
{block name="script"}
<script>

window.onload = showInputButton();
document.getElementById('submit-button').disabled = true;
</script>
{/block}