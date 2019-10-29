ClassicEditor
	.create( document.querySelector( '.ckeditor' ) , {
		ckfinder: {
			uploadUrl: document.head.baseURI + 'assets/ckeditor/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
		}
	})
	.catch( error => {
		console.error( error );
	} );
