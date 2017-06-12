<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = str;
            }
        };
        xmlhttp.open("GET", "ajaxTestCompanion.php", true);
        xmlhttp.send();
    }
}
</script>



</head>

<body>

<form>
	<input type="text" onkeyup="showHint('dsd')">
</form>
<p id="txtHint"></p>
</body>
</html>