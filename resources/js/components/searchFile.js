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

window.exporAll = function() {
    const form = document.getElementById('frm-export');
    let data = new FormData(form);

    let url = '/admin/archivos/export/select';

    axios.post(url, data)
        .then(function (response) {
            
    });

}