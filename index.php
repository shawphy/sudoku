<?php
if(!file_exists("sudoku.sqlite"))include "install.php";

$dbh = new PDO('sqlite:sudoku.sqlite');
$hwf=$dbh->query("select * from sudoku ORDER BY RANDOM() LIMIT 1;");
$sudoku=$hwf->fetchAll(PDO::FETCH_NUM);

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>Sudoku</title>
	<style>
		table{margin: 30px auto 0;border-collapse:collapse;text-align: center;font-size: 30px;font-family: consolas;}
		tbody {border: 2px solid #000;}
		tbody td {border: 1px solid #999;width: 40px;height: 40px;}
		tbody td:nth-child(3n){border-right: 2px solid #000;}
		tbody tr:nth-child(3n){border-bottom: 2px solid #000;}
		tfoot {font-size: 16px;}
		tfoot td:first-child{text-align: left;}
		tfoot td:last-child{text-align: right;}
	</style>
</head>
<body>
	<table>
		<tbody id="sudoku"></tbody>
		<tfoot><tr>
			<td colspan="3">#<?php echo $sudoku[0][0];?></td>
			<td colspan="3" id="rank"></td>
			<td colspan="3"><a href="" title="Next">Next</a></td>
		</tr></tfoot>
	</table>
	<script>
		document.getElementById("sudoku").innerHTML="<?php echo $sudoku[0][1];?>".replace(/(\d{9})/g,"<tr>$1</tr>").replace(/(\d)/g,"<td>$1</td>").replace(/0/g,"");
	</script>
</body>
</html>
