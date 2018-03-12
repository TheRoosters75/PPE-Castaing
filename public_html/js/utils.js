function checkForm() {
	try {
		if ($.trim($('#nom').val()) == "" ||
			$.trim($('#tel').val()) == "" ||
			$.trim($('#description').val()) == "") {
				alert("Tous les champs sont obligatoire");
				return false;
			}
	} catch (e) {
		alert(e);
		return false;
	}
	return true;
}

function deleteEntry(id) {
	try {
		var confirmString = "Supression d'un contact.  Confirmez-vous ?\n" + $.trim($('#nom').val()) + "\n" + $.trim($('#tel').val()) + "\n" + $.trim($('#description').val());
		if (window.confirm(confirmString)) {
			window.location="test.php?action=delete&id=" + id;
                         
		}
	} catch (e) {
		alert(e);
		return false;
	} 
	return true;

}