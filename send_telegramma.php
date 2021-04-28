<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Бланк телеграммы</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style_screen.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="telegramma">
<br><br>
  <form enctype='multipart/form-data' action="telegramma.php?comment" method="post" name="comment" id="comment">
    <table width="606" border="2" align="center" cellpadding="5" cellspacing="5" bordercolor="#660000">
      <tbody>
        <tr>
          <td colspan="2" align="center"><h1>&nbsp;</h1>
          <h1>Заполните бланк поздравительной телеграммы: </h1></td>
        </tr>
        <tr>
          <td width="140"  align="right"><strong>от кого:</strong> </td>
          <td width="317"><input name="name" type="text" size="35" /></td>
        </tr>
        <tr>
          <td align="right" valign="top"><p><strong>ТЕКСТ ТЕЛЕГРАММЫ: </strong></p></td>
          <td><textarea name="comment" cols="50" rows="15"></textarea>          </td>
        </tr>

        <tr>
          <td align="right" valign="top"><p><strong>ВАША ФОТОГРАФИЯ:</strong></p>
            <span class="small">приложите фотографию в любом размере и формате, размер будет изменен автоматически </span>
          
          </p></td>
          <td><input name="MAX_FILE_SIZE" value="3000000" type="hidden" />
              <input name="pic" type="file" size="40" />
            <br />          </td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="top"><p>
            <input name="submit" value="ОТПРАВИТЬ ТЕЛЕГРАММУ" type="submit" class="button" />
          </p>
          <p class="small">будьте терпеливы - отправка телеграммы занимает время!<br />
            Ваше сообщение будет добавлено последним в списке
</p></td>
        </tr>
      </tbody>
    </table>
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>
