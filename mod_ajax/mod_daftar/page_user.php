<script type="text/javascript">

$('#datauser').DataTable({
	responsive: true,
	 "lengthMenu": [5, 10, 25, 50, "All"]
});	

function editme(url){
	page=url;
	$("#divFormContent").load(page); 
	return false;
}

function loadData(){
	page="mod_ajax/mod_user/page_user.php";
	$('#divPageData').load(page);
}

function deleteData(username){
	if(confirm("Apakah benar akan menghapus data user: "+username+" ini?\nPerhatian: Penghapusan user menyebabkan user bersangkutan tidak dapat login!")){
		
		var datastring = 'action=delete&kode='+username;
		$.ajax({
			url: "mod_ajax/mod_user/proses_user.php",
			data: datastring,
			type: "POST",
			dataType: 'json',
			success:function(response)
			{
				if(response.status == 1){
					loadData();
					$("#divFormContent").load("mod_ajax/mod_user/formuser.php");
					alert("Data berhasil di hapus!");
				}
				else{
					alert("Data gagal di hapus!");
				}
			}
		});
	}
	return false;
}
</script>
