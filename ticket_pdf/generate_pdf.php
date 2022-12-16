<?php 

require ('../assets/dompdf/vendor/autoload.php');
require ('../controller/shared.php');

use Dompdf\Dompdf;
use Dompdf\Options;



$options = new Options;

$options-> setChroot(dirname(dirname(__DIR__)));

$options-> setIsRemoteEnabled(true);

$TicketPdf = new Dompdf($options);

$html = file_get_contents("ticketPDF.php");

$ticket=displayTicket();

$html = str_replace("{{Team1}}", $ticket['tname'],$html);
$html = str_replace("{{Team2}}",$ticket['t2name'],$html);
$html = str_replace("{{stadium}}",$ticket['Sname'],$html);
$html = str_replace("{{date}}" ,$ticket['reservation_date'],$html);
$html = str_replace("{{price}}",$ticket['ticket_price'],$html);
$html = str_replace("{{image}}",$ticket['mimage'],$html);

$TicketPdf->loadHtml($html);

$TicketPdf->render();

$TicketPdf->stream("Myticket.pdf" , ["Attachment"=> 0]);