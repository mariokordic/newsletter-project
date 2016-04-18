<?php
header('Content-type:text/html; charset=utf-8');
include_once "connect_to_mysql.php";
$sql= "SELECT * FROM newsletter WHERE received='0' LIMIT 20";
$mail_body = '';
$rows = $conn->query($sql);
$num_rows = $rows->rowCount();

echo  "Poslano na" . $num_rows;
foreach($rows as $row){
    $id=$row['id'];
    $email=$row['email'];
    $name = $row['name'];
}
$mail_body = '<!DOCTYPE HTML><html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<body style="color:#000; font-family: Arial, Helvetica, sans-serif; line-height:2.1em;">
<h3><a href="http://biovitamini.com"><img src="http://biovitamini.com/newsletter/img/logo.png" alt="logo" width="300" height="150" border="0"></a>
</h3>
<p>Poštovani,</p>
<p>nudimo Vam proizvode CaliVite koje možete pogledati i naručiti putem web stranice: </p>
<p>http://biovitamini.com</p>
<p color:"green">Svi proizvodi su dodatno ispitani i imaju odobrenje Ministarstva zdravlja Republike Hrvatske.</p>
<p>U nastavku izdvajmo nekoliko CaliVitinih proizvoda, a za potpuni uvid molim da posjetite navedenu stranicu.</p>
<br/>
<img src="http://biovitamini.com/newsletter/img/liquid_chlorophyll.jpg" width="240" height="160" >
<p><h4><a href="http://biovitamini.com/proizvod/liquid-chlorophyll-473-ml/">Tekući klorofil</h4></a>Prva linija obrane od mnogobrojnih karcinogena u ljudskoj prehrani i okolišu su tvari koje sprečavaju mutaciju gena. Mnoge antimutagene tvari su do sada pronađene u voću i povrću, a od svih do sada poznatih tvari iz riznice prirode, najsnažnije antikancerogeno svojstvo ima klorofilin. Klorofilin koristimo i kao antioksidans, pH regulator te prirodno sredstvo za iscjeljivanje rana.</p>
<img src="http://biovitamini.com/newsletter/img/Trimex.jpg" width="240" height="160">
<p><h4><a href="http://biovitamini.com/proizvod/trimex-473-ml/">TrimeX (473 ml)</h4></a>TrimeX je tekući koncentrat nove generacije s višestrukim djelovanjem:
<ol>
 <li>smanjuje apetit</li>
 <li>detoksicira jetru i probavni sustav</li>
 <li>ubrzava metabolizam</li>
 <li>pospješuje termogenezu</li>
</ol>
Trimex se obično uzima nekoliko sati nakon zadnjeg obroka ili prije spavanja pa se za njega popularno kaže da djeluje dok mi - spavamo!</p>
<img src="http://biovitamini.com/newsletter/img/noni.jpg" width="240" height="160">
<p><h4><a href="http://biovitamini.com/proizvod/organic-noni-946-ml/">Organic Noni</h4></a>Noni je adaptogena biljka čija je popularnost temeljena na najvećem sadržaju prokseronina u prirodi. Čitav niz zanimljivih tvari čini u plodu nonija jedinstvenu cjelinu koja na staničnoj razini proizvodi i jedinstven biološki učinak. Visoki sadržaj djelatnih tvari, farmaceutska kvaliteta sirovine, savršena očuvanost nepropusnom ambalažom i ugodan okus opravdavaju dugogodišnju popularnost Noni soka.</p>
<hr>
<p>Za odjavu s ovog newsletter-a,  <a href="http://biovitamini.com/newsletter/optout.php?e=' . $email . '">pristisnite ovdje</a> i uklonit ćemo Vaš e-mail s liste.</p>
</body>
</html>';
$subject = "BioVitamini Newsletter";
$headers  = "From:newsletter@biovitamini.com\r\n";
$headers .= "Content-type: text/html\r\n";
$to = "$email";


$mail_result = mail($to, $subject, $mail_body, $headers);
if ($mail_result) {
    $sql1= "UPDATE newsletter SET received= '1' WHERE email=? LIMIT 1";
    $q = $conn->prepare($sql1);
    $q->execute(array($email));

} else {
    // this else statement can be used to write into an error log if the mail function fails
    // It can also be removed if you do not need error logging
}
?>

<?php
// This section is script I discussed adding to this file on video
// This section is for sending the site owner a message informing them that
// all people in the database have been sent the newsletter for the current campaign
/*
if ($numRows == 0) { // $numRows is set on line 4 using the existing query

    $subj = "Newsletter Campaign Has Ended";
    $body = "The current newsletter campaign has ended. All have been sent the newsletter.";
    $hdr  = "From:newsletter@webdivstudio.com\r\n";
    $hdr .= "Content-type: text/html\r\n";
    mail("mario84os@gmail.com", $subj, $body, $hdr);

}
*/
// End Check Section
?>

