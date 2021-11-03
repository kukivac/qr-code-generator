<?php
/* composer require chillerlan/php-qrcode */
use chillerlan\QRCode\QRCode;

/**
 * @param $iban string IBAN účtu kam mají přijít peníze
 * @param $vs string Variabilní symbol
 * @param $ammount string Částka
 * @param $filePath string cesta kam uložit QR kod
 */
function generateQrPayment($iban, $vs, $ammount, $filePath)
{
    // Přidej cestu k vendor autoload souboru
    require_once("vendor/autoload.php");
    $qrcode = new QRCode();
    $data = 'SPD*1.0*ACC:'.$iban.'*AM:' . $ammount . '*X-VS:' . $vs . '*CC:CZK';
    $qrcode->render($data, $filePath);
}
generateQrPayment("CZ4903000000000295628531","25","200.00","./qrs/code.png");