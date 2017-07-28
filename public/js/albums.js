document.addEventListener("DOMContentLoaded", function(event) {
    Dropzone.autoDiscover = false;

  $("#albumForm div.dropzone").dropzone({
    url: uploadAlbumUrl,
    paramName: 'images',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 20,
    maxFilesize: 3,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dz = this; // Makes sure that 'this' is understood inside the functions below.

        document.getElementById("albumFormSubmit").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            if (dz.getQueuedFiles().length < 5) {
                alert('At least 5 images per album');
            }

            e.preventDefault();
            e.stopPropagation();
            dz.processQueue();
        });
        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("title", $("#albumForm [name='title']").val());
            formData.append("description", $("#albumForm [name='description']").val());
            formData.append("_token", $("#albumForm [name='_token']").val());
        });

        this.on("maxfilesexceeded", function(){
            this.removeFile(file)
        });

        this.on("queuecomplete", function (file) {
            location.reload();
        });
    }
  });
});

$(document).ready(function() {

});
