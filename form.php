<html>
<head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
  background-color: rgb(255, 0, 0, 0.3); 
}
    </style>
  </head>

  <body>
  <?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

<div class = "body">
<form action="index.php" method="POST">
  <div class = "main">
 <div class = "name"><label>ФИО</label>
 <input name= "fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print strip_tags($values['fio']); ?>" /></div>
  <div class = "email"><label>Электронная почта</label>
  <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print strip_tags($values['email']); ?>" /></div>
  <div class = "year"><label>Год рождения</label>
  <select name="year" <?php if ($errors['year']) {print 'class="error"';} ?> value="<?php print strip_tags($values['year']); ?>">
  <?php
       for($i=1920;$i<=2023;$i++){
         if($values['year']==$i){
          printf("<option value=%d selected>%d </option>",$i,$i);
            }
        else{
          printf("<option value=%d>%d </option>",$i,$i);
        }
    }
   ?>
  </select></div>
  <div class = "gender" <?php if ($errors['gender']) {print 'class="error"';} ?>><label>Ваш пол?</label>
  <label>Мужской</label><input type="radio" checked="checked" name="gender" value="0" <?php if($values['gender']=="0") {print 'checked';} ?>/>
  <label>Женский</label><input type="radio" name="gender" value="1" <?php if($values['gender']=="1") {print 'checked';} ?>/>
  </div>
  
  <div class = "limbs"><label>Количество конечностей?</label> <?php if ($errors['limbs']) {print 'class="error"';} ?>
  <label>4</label>
  <input type="radio" checked="checked" name="limbs" value="4" <?php if($values['limbs']=="4") {print 'checked';} ?>/>
  <label>8</label>
  <input type="radio" name="limbs" value="8" <?php if($values['limbs']=="8") {print 'checked';} ?>/>
  <label>16</label>       
  <input type="radio" name="limbs" value="16" <?php if($values['limbs']=="16") {print 'checked';} ?>/>
  </div>

  <div class = "ability" <?php if ($errors['abilities']) {print 'class="error"';} ?>>  
  <select name="abilities[]" multiple="multiple"> 
    <option value="ab_in" <?php if($values['ab_in'] == 1){print 'selected';} ?>>Невидимость</option>
    <option value="ab_t" <?php if($values['ab_t'] == 1){print 'selected';} ?>>Телепортация</option>
    <option value="ab_l" <?php if($values['ab_l'] == 1){print 'selected';} ?>>Левитация</option>
    <option value="ab_v" <?php if($values['ab_v'] == 1){print 'selected';} ?>>Всезнание</option>
  </select>
  </div>

  <div class = "biography"><label> Ваша биография:</label> 
        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"';} ?>><?php print $values['biography']; ?></textarea>
  </div>

  <?php 
      $lc='';
       $ch='';
     if($values['check1'] or !empty($_SESSION['login'])){
      $ch='checked';
      }
     if ($errors['check1']) {
      $lc='class="error"';
      }
       print('
           <div  '.$lc.' >
            <input name="check1" type="checkbox" '.$ch.'> Я согласен с политикой компании <br>
            </div>');
     ?>

                
     <input type="submit" value="Отправить" />
  </form>
    <?php
      if(empty($_SESSION['login'])){
         echo'
          <div class="login">
             <p> <a href="login.php">Если имеется аккаунт, то нажмите здесь</a></p>
          </div>';
          }
      else{
          echo '
            <div class="logout">
              <form action="index.php" method="post">
                  <input name="logout" type="submit" value="Выйти">
              </form>
            </div>';
         } ?>

       
  </div>
  </body>
</html>
