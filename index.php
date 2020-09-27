<?php
    require 'vendor/autoload.php';
    include 'config.php';
    use Dompdf\Dompdf;
    $loader = new \Twig\Loader\FilesystemLoader('path/to/templates');
    $twig = new \Twig\Environment($loader);

    $dompdf = new Dompdf();
    $sql = 'SELECT * FROM user';
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $html = $twig->render('ticket.html', array('user' => $result));
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream("dokumentku", array("Attachment" => 0));

