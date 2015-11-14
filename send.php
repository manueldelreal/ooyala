<?php 
// Here we get all the information from the fields sent over by the form.
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$to = 'dare639@hotmail.com';
$subject = 'Enquire about dotSquare';
$headers = "From: " . strip_tags($name) . "\r\n";
$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<table width="752px" cellpadding="0" cellspacing="0" align="center">';
$message .= '<tbody><tr>';
$message .= '<td>';
$message .= '<table cellpadding="0px" cellspacing="0px">';
$message .= '<tbody><tr>';
$message .= '<td>';
$message .= '<img src="" style="border:none">';
$message .= '</td>';
$message .= '</tr>';
$message .= '</tbody></table>';
$message .= '</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td>';
$message .= '<table style="width:752px;padding-top:12px;margin:0 auto;border:1px solid #d9d9d9;font-family:Arial;border-top:none">';
$message .= '<tbody><tr>';
$message .= '<td height="40" colspan="2" style="padding-left:12px;line-height:24px;font-size:24px">';
$message .= '            Dear Admin';
$message .= '            </td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td height="40" style="font-size:14px;color:#666666;line-height:24px;padding-left:12px">';
$message .= '           You have received an Inquiry from <a href="DotSquare" target="_blank">http://nasfactor.com/themes/dotsquare/html/</a>! ';
$message .= '</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td style="font-size:14px;color:#dc0000;line-height:24px;padding-left:12px" height="40">';
$message .= '            Details are as below:';
$message .= '            </td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td>';
$message .= '<table style="line-height:35px;font-size:14px;margin-left:12px;font-family:Arial,Helvetica,sans-serif">';
$message .= '<tbody><tr>';
$message .= '<td width="183px" style="font-weight:bold">Name:</td>';
$message .= '<td>' . strip_tags($name) . '</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td width="183px" style="font-weight:bold">Email Address:</td>';
$message .= '<td><a href="mailto:$email" target="_blank">' . strip_tags($email) . '</a></td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td width="183px" style="font-weight:bold;display:block">Details:</td>';
$message .= '<td style="line-height:24px">' . htmlentities($details) . '</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td colspan="2" width="183px" style="display:block">Regards,</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td colspan="2" width="183px" style="font-weight:bold;display:block">dotsquare.com</td>';
$message .= '</tr>';
$message .= '</tbody></table>';
$message .= '</td>';
$message .= '</tr>';
$message .= '</tbody></table>';
$message .= '</td>';
$message .= '</tr>';
$message .= '</tbody></table>';
$message .= "</body></html>"; 
if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // this line checks that we have a valid email address
mail($to, $subject, $message, $headers); //This method sends the mail.
echo "<div class='success'><div class='text-msg'>Your email was sent!</div></div>"; // success message
}else{
echo "<div class='error-msg'>Invalid Email, please provide an correct email.</div>";
}

