<?php

namespace portfolio\classes\Contact;

class Contact
{
  public static function Contact_form()
  {
    if (isset($_POST['sub_contact'])) :
      // extract($_POST);
      ini_set("SMTP", "smtp.gmail.com");
      ini_set("smtp_port", "25");
      $name = addslashes($_POST['name_contact']);
      $mail = addslashes($_POST['mail_contact']);
      $num = addslashes($_POST['number_contact']);
      $msg = addslashes($_POST['message_contact']);
      $dist = "ucefsalim@gmail.com";
      $sujet = "contact Form";
      $msg = "Nouveau mail \n
               Nom: $name \n
               Email: $mail\n
               Message: $msg ";

      $entet = "From : $name \n  Reply-To: $mail";
      mail($dist, $sujet, $msg, $entet);
    endif;
  }
}
