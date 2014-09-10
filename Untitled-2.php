<script>
	function recordClick(ad_id){
    var id = ad_id;
    
    alert( "in record"); // is not getting here...
    obj = getHTTPObject();
    
    var link = "./record_click.php?ad_id" + id;
    if( obj != null ){
        obj.open( "GET", link, true );
        obj.send( null );
        obj.onreadystatechange = outputData;
    }
}
</script>
<script>
function addClick(ad_id){
	var id = ad_id;
    
    
    obj = getHTTPObject();
    alert( obj);
    var link = "./record_click.php?ad_id" + id;
	alert( link);
    if( obj != null ){
        obj.open( "GET", link, true );
        obj.send( null );
        obj.onreadystatechange = outputData;
    }
}
