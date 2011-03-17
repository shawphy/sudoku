<?php
if(!file_exists("sudoku.sqlite")){
	$dbh = new PDO('sqlite:sudoku.sqlite');
	$dbh->exec('CREATE TABLE "sudoku" ("id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL ,"sudoku" TEXT,"rank" INTEGER DEFAULT (0) )');
	$dbh->exec('insert into sudoku (sudoku) values (" 7   8     1     4  24  5   8  3   7  52  4  9      8   9  61  7     3     1   4 ")');
	$dbh->exec('insert into sudoku (sudoku) values ("3  9       76  4   4      6  6  15   1 4   8   5   7  7      3   8  52       3  4")');
	$dbh->exec('insert into sudoku (sudoku) values (" 9 6  8    3    6   79      1     7 9    3  4 8 4   2      23   6    2    5  8   ")');
	$dbh->exec('insert into sudoku (sudoku) values (" 4 2  8    1   9  6    4     6 1  7 1   2   4 7    3     7    3  8   2    5  3 9 ")');
	$dbh->exec('insert into sudoku (sudoku) values ("5   9      6    4   93   7  2   3 5   1 2 9   4     3  6   81   7    3      1   6")');
	$dbh->exec('insert into sudoku (sudoku) values (" 4       9    84  2    13   3 8   7   6   1   1   5 4   87    6  32    7       9 ")');
	$dbh->exec('insert into sudoku (sudoku) values (" 56      1  7  2      92    14 8    8       9    4 35    53      9  8  2      16 ")');
	$dbh->exec('insert into sudoku (sudoku) values ("  73  2  3       18  62     734    5         5    849     67  42       6  9  43  ")');
	$dbh->exec('insert into sudoku (sudoku) values ("4         9   25    83  1   7  9   65       39  2   4   6  82    76   9         7")');
	$dbh->exec('insert into sudoku (sudoku) values ("4       5 2  7 9   1 6      9  1   2 6     1 2    7 3      9 8   3 5  2 8       6")');
}

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
		document.getElementById("sudoku").innerHTML="<?php echo $sudoku[0][1];?>".replace(/([\d\s]{9})/g,"<tr>$1</tr>").replace(/([\d\s])/g,"<td>$1</td>");
		document.getElementById("rank").innerHTML=["☆☆☆☆☆","★☆☆☆☆","★★☆☆☆","★★★☆☆","★★★★☆","★★★★★"][<?php echo $sudoku[0][2];?>];
	</script>
</body>
</html>
