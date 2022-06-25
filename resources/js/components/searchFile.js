$('#iSelectAll').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 

window.modalSendEmail = function() {
    const form = document.getElementById('frm-export');
    let data = new FormData(form);
    console.log(data);
    $('#modal-correo').modal('show');
}

window.sendFilesEmail = function() {
    $('#loading-email').show();
    const form = document.getElementById('frm-export');
    let data = new FormData(form);

    let url = '/admin/archivos/export/send-email';

    axios.post(url, data)
        .then(function (response) {
            $('#loading-email').hide();
            Swal.fire(
                'Información',
                'El correo se ha enviado',
                'success'
              )
    });

}