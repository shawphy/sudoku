<?php
if(preg_match('/^[\d\s]{81}$/',$_POST["uploadsudoku"]) && preg_match('/^\d$/',$_POST["uploadrank"])){
	$dbh = new PDO('sqlite:sudoku.sqlite');
	$row=$dbh->query("select * from sudoku where sudoku='".$_POST["uploadsudoku"]."';")->fetch();
	if($row[0]){
		echo "已经存在 #".$row[0][0];
	}else{
		$dbh->exec('insert into sudoku (sudoku,rank) values ("'.$_POST["uploadsudoku"].'",'.$_POST["uploadrank"].')');
		echo "输入成功";
	}
}
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
		#uploadwrap,textarea{margin:0 auto;width: 1200px;height: 400px;}
		#rank span{cursor:pointer;}
	</style>
</head>
<body>
	<table>
		<tbody id="sudoku"></tbody>
		<tfoot><tr>
			<td colspan="3"></td>
			<td colspan="3" id="rank">
				<span onclick="rank(1)">☆</span>
				<span onclick="rank(2)">☆</span>
				<span onclick="rank(3)">☆</span>
				<span onclick="rank(4)">☆</span>
				<span onclick="rank(5)">☆</span>
			</td>
			<td colspan="3">
				<form method=post action="upload.php">
					<input type="hidden" name="uploadsudoku" id="uploadsudoku" value="<?php echo $_POST["uploadsudoku"];?>">
					<input type="hidden" name="uploadrank" id="uploadrank">
					<input type="submit" value="提交">
				</form>
			</td>
		</tr></tfoot>
	</table>
	<div id="uploadwrap"><textarea id="upload"></textarea></div>

	<script>
		document.getElementById("upload").onkeyup=function (){
			if (this.value.substr(0,1)=="\n"){
				this.value=this.value.substr(1);
			}
			var v=this.value.replace(/\n/g,"\t").split(/\t/);
			for (var i=0,l=v.length; i<l; i++){
				v[i]=(v[i]==""?" ":v[i]);
			}
			v.pop();
			document.getElementById("uploadsudoku").value=v.join("");
			document.getElementById("sudoku").innerHTML=document.getElementById("uploadsudoku").value.replace(/([\d\s]{9})/g,"<tr>$1</tr>").replace(/([\d\s])/g,"<td>$1</td>");
		}
		function rank(r){
			var s=document.getElementById("rank").getElementsByTagName("span");
			for (var i=0; s[i]; i++){
				s[i].innerHTML=i<r?"★":"☆";
			}
			document.getElementById("uploadrank").value=r;
		}
		document.getElementById("sudoku").innerHTML=document.getElementById("uploadsudoku").value.replace(/([\d\s]{9})/g,"<tr>$1</tr>").replace(/([\d\s])/g,"<td>$1</td>");
		rank(<?php echo $_POST["uploadrank"];?>);
	</script>
</body>
</html>
