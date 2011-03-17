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
		#uploadwrap,textarea{margin:0 auto;width: 1200px;height: 400px;}
	</style>
</head>
<body>
	<table>
		<tbody id="sudoku"></tbody>
		<tfoot><tr>
			<td colspan="3">#</td>
			<td colspan="3" id="rank"></td>
			<td colspan="3"><a href="" title="Next">Next</a></td>
		</tr></tfoot>
	</table>
	<div id="uploadwrap"><textarea name=""  id="upload"></textarea></div>

	<script>
		document.getElementById("upload").onchange=function (){
			console.log(this.value)
			var v=this.value.replace(/\n/g,"\t").split(/\t/);
			for (var i=0,l=v.length; i<l; i++){
				v[i]=(v[i]==""?" ":v[i]);
			}
			v.pop();
			document.getElementById("sudoku").innerHTML=v.join("").replace(/([\d\s]{9})/g,"<tr>$1</tr>").replace(/([\d\s])/g,"<td>$1</td>");
		}

	</script>
</body>
</html>
