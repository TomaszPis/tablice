<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Tablice/faktury/</title>
</head>
<body>
<div id="start">
	<form action="" method="post">
		Podaj numer faktury:<input type="text" name="nr_fv"><br>
		Podaj kwotę faktury:<input type="text" name="kw_fv"><br>
		Podaj procent podatku:
		<select name="pd_fv">
			<option>5</option>
			<option>8</option>
			<option>23</option>		
		</select> % <br>
		Podaj termin zapłaty: <input type="text" name="tr_fv"><br><span style="color: #666666; font-size: 10px">(dd.mm.rrrr)</span><br>
		Opłacona:
		<select name="op_fv">
			<option>tak</option>
			<option>nie</option>	
		</select>
		<br>
		<input type="submit" name="action" value="Wyślij">
	</form>

</div>
</body>
