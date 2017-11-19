<?php

//Dane faktury opisane w tablicach
$faktury_nr = array('12f/058/2017', '95f/112/2017', '03f/958/2017');
$faktury_kwota = array(123.99, 1299.99, 499.99);
$vat = array(23, 23, 5);
$faktury_termin = array('20.12.2016', '05.11.2017', '15.12.2017');
$zaplacone = array('tak', 'nie', 'tak');


//Dodaj ostatni element tablicy
if(isset($_POST['action']) and $_POST['action'] == 'Wyślij'){
	$faktury_nr[] = $_POST['nr_fv'];
	$faktury_kwota[] = $_POST['kw_fv'];
	$vat[] = $_POST['pd_fv'];
	$faktury_termin[] = $_POST['tr_fv'];
	$zaplacone[] = $_POST['op_fv'];
}


function wypisz_fv($n, $k, $v, $t, $z){
	
	//oblicz wartość netto faktury
	$wartosc_podatku = round($k * $v / 100, 2);//wartość podatku zaokrąglij do dwóch miejsc po przecinku
	$kwota_netto = $k - $wartosc_podatku;

	//Jezeli faktura nie została opłacona wyświetl ją na czerowno
	if($z != 'tak'){
		echo "<tr><td> $n </td><td> $k </td><td> $kwota_netto </td><td> $v% </td><td> $t </td><td style='color: red'> $z </td><tr>";
	}
	else{
		echo "<tr><td> $n </td><td> $k </td><td> $kwota_netto </td><td> $v% </td><td> $t </td><td style='color: green'> $z </td><tr>";
	}

}


//posortuj tablicę wg kwoty, malejąco
array_multisort($faktury_nr, SORT_DESC, $faktury_kwota, $vat, $faktury_termin, $zaplacone);


//Wyświetl dane w postaci tabeli
echo "<table style='text-align: center'>";
echo '<tr><th>Nr faktury</th><th>Kwota brutto </th><th>Kwota netto</th><th>Vat</th><th>Termin zapłaty</th><th>Czy zapłacone</th><tr>';
array_map('wypisz_fv', $faktury_nr, $faktury_kwota, $vat, $faktury_termin, $zaplacone);
echo '</table>';


//załącz szablon dodający ostatni element tablicy
include 'faktury2.php';
