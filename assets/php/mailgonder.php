<?php header("Content-type: text/html; charset=utf-8"); ?>
<form method="post">
<label for="name">İsim:</label><br>
<input type="text" name="name" id="name"><br>
<label for="mail">Mail</label><br>
<input type="text" name="mail" id="mail"><br>
<label for="subject">Konu</label><br>
<input type="text" name="subject" id="subject"><br>
<label for="message">Mesajınız</label><br>
<textarea name="message" cols="30" rows="10" id="message"></textarea><br><br>
<input type="submit" value="Gönder">
</form>