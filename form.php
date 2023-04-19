<link rel="stylesheet" href="style.css" type="text/css"/>
<style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
  margin-top: 10%;
  background: antiquewhite;
}
    </style>
<div class = "body">
<form action="" method="POST">
<?php 
if (!empty($messages)) {
      print('<div id="messages">');
      // Выводим все сообщения.
      foreach ($messages as $message) {
        print($message);
      }
      print('</div>');
    }
    ?>
  <div class = "main">
 <div class = "name"><label>Введите фио</label>
  <input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>"/></div>
  <div class = "email"><label>Введите электронную почту</label>
  <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>"/></div>
  <div class = "year"><label>Введите год</label>
  <select name="year" <?php if ($errors['year']) {print 'class="error"';} ?> value="<?php print $values['year']; ?>"/>
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select></div>
  <div class = "gender"><label>Укажите пол:</label>
  <label>Мужской</label><input type="radio" checked="checked" name="gender" value="0"/>
  <label>Женский</label><input type="radio" name="gender" value="1" />
  </div>
  
  <div class = "limbs"><label>Количество конечностей?</label>
  <label>4</label>
  <input type="radio" checked="checked" name="limbs" value="4" />
  <label>8</label>
  <input type="radio" name="limbs" value="8" />   
  <label>16</label>       
  <input type="radio" name="limbs" value="16" /> 
  </div>

  <div class = "ability">
  <select name="abilities" multiple="multiple"></br>
    <option select="selected" value="immrotality">Бессмертие</option>
    <option value="noclipping">Режим призрака</option>
    <option value="levitation">Левитация</option>
  </select>
  </div>

  <div class = "biography"><label> Ваша биография:</label></br>
        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?> value="<?php print $values['biography']; ?>"/></textarea>
  </div>

  <p>
    <input type="checkbox" name="check1" /> С контрактом ознакомлен(а)
 </p>
  <input type="submit" value="отправить" />
  </div>
</form>
  </div>
