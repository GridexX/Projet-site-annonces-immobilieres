{extends 'main.tpl'}
{block name="output_area"}
  <div class="flex-container w75 item-center">
    <div class="annonce-container formulaire w60 item-center">
    <form method="post" enctype="multipart/form-data" action="/photo/create/1">
      <div>
        <label class="btn--success" for="image_uploads" style="width:auto;">Sélectionner des images à uploader (PNG, JPG)</label>
        
        <input type="file" id="image_uploads" style="cursor:default;" name="image_uploads" {*accept=".jpg, .jpeg, .png"*} multiple value="Sélectionner des images à uploader (PNG, JPG)" >
      </div>
        <div class="preview flex-container item-center txt-center">
          <div class="w90 item-center txt-center">
          <p>Aucun fichier sélectionné pour le moment</p>
          </div>
        </div>
      <div>
      <input class="btn--primary" type="submit" value="Valider" name="inscription"/>
                    <input class="btn--danger" type="reset" value="Effacer"/>
          </div>

    </form>
    </div>
</div>
<script>
var input = document.querySelector('input');
var preview = document.querySelector('.preview');

input.style.opacity = 100;
input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  var curFiles = input.files;
  if(curFiles.length === 0) 
  {
    var para = document.createElement('p');
    para.textContent = 'Pas encore d\'images de sélectionnées';
    preview.appendChild(para);
  } 
  else
  {
    var list = document.createElement('ol');
    preview.appendChild(list);
    if(curFiles.length <= 5)
    {
      for(var i = 0; i < curFiles.length; i++) 
      {
        var listItem = document.createElement('li');
        var para = document.createElement('p');
        if(validFileType(curFiles[i])) {
          para.textContent = 'Fichier : ' + curFiles[i].name + ', taille : ' + returnFileSize(curFiles[i].size) + '.';
          var image = document.createElement('img');
          image.src = window.URL.createObjectURL(curFiles[i]);
          listItem.appendChild(para);
          listItem.appendChild(image);
          listItem.appendChild(document.createElement('hr'));
        } 
        else 
        {
          para.textContent = 'Fichier : ' + curFiles[i].name + ' n\'est pas dans un format valide. Veuillez le changer.';
          listItem.appendChild(para);
        }

        list.appendChild(listItem);
      }
    }
    else
    {
      var div = document.createElement('div');
      var title = document.createElement('h5');
      var para = document.createElement('p');
      div.classList.add("notif-container");

      div.classList.add("warning");

      title.textContent = "Warning : "
      para.textContent = "Vous avez inséré trop de photos, veuillez en enlever";
      
      div.appendChild(title);
      div.appendChild(para);
      list.appendChild(div);


      
    }
  }
}

var fileTypes = [
  'image/jpeg',
  'image/jpg',
  'image/png'
]

function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    }
  }

  return false;
}

function returnFileSize(number) {
  if(number < 1024) {
    return number + ' octets';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + ' Ko';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + ' Mo';
  }
}
</script>
{/block}