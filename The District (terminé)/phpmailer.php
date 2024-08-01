<?php
require_once ('header.php');
require_once ('DAO.php');
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

function mailCommande($adresseclient,$mailclient,$totalclient,$quantiteclient,$nomclient,$total){
    
$datejour=date("d-m-Y");
$dateheure=date("H:m");

$subject="Objet : Confirmation de votre commande chez The District";
$txtmail = "Madame, Monsieur ".$nomclient.",<br>
<br>Nous vous remercions pour votre commande effectuée sur notre site ! Nous sommes ravis de vous informer que votre commande a été reçue et est en cours de préparation.<br>
<br><b>Détails de la commande :</b>

<br>Nom et prénom du client : Madame, Monsieur ".$nomclient."
<br>Adresse de livraison : ".$adresseclient."
<br>Date et heure de la commande : Le ".$datejour." à ".$dateheure."
<br>Mail du client : ".$mailclient."
<br>Produits commandés : ".$total."
<br>Quantité : ".$quantiteclient."
<br>Total du(des) produit(s) : ".$totalclient." euros.

<p>Nous nous engageons à préparer votre commande avec soin pour garantir votre entière satisfaction. Vous recevrez une notification lorsque votre commande sera prête pourla livraison.<p>
<p>Si vous avez des questions ou souhaitez apporter des modifications à votre commande, n'hésitez pas à nous contacter au 09/**/**/**/** ou par email à thedistrict@laposte.fr.</p>
<br>Merci pour votre confiance et à qu'on ne vous revoit plus !
<br> Cordialement, Monsieur Igor Gonzola.
<br><b>Les équipes de <b><i>The District</i></b></b>";


$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;    

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;                                   

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('thedistrict@laposte.fr', 'The District');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress("client1@example.com", "Mr Client1");
$mail->addAddress("client2@example.com"); 

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(true);

/* On ajoute la/les pièce(s) jointe(s)
$mail->addAttachment('/path/to/file.pdf');*/

// Sujet du mail
$mail->Subject = $subject;

// Corps du message
$mail->Body = $txtmail;

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail){
    try {
        $mail->send();
        echo 'Email envoyé avec succès';
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
}

?>