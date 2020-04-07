<script>function id(id) {
    return document.getElementById(id);
}
var val1 = 0;
var val2 = 0;

function val() {
    val1 = parseInt(id("total_Qut").value);
    val2 = parseInt(id("rate").value);
    id("sub_tot").innerHTML = ((val1 > 0 && val2 > 0)) ? val1 * val2 : 0;
}
</script>
