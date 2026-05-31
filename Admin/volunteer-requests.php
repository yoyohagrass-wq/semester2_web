<?php
?>
<script>
function showHint(str) {
    myvar = document.getElementById("Hint");
    if (str.length > 0) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myvar.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "search_db.php?name=" + str, true);
        xhttp.send();
    } 
}
</script>
<form method="post" action="Myfile.php">
    Username :
    <input type="text" id="name" name="name" onkeyup="showHint(this.value)"><br><br>
    <div id="Hint">Some Text</div>
    
</form>