
$(document).on("ready", function () {

   Dropzone.options.myDropzone = {
    autoProcessQueue: true,
    uploadMultiple: true,
    maxFilezise: 4,
    maxFiles: 4,

    init: function() {
        var submitBtn = document.getElementById("my-dropzone");
        myDropzone = this;

        submitBtn.addEventListener("click", function(e){
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });
        this.on("addedfile", function(file) {
                    //alert("file uploaded");
                });

        this.on("complete", function(file) {
                    window.location.reload();
                });

        this.on("success", 
            myDropzone.processQueue.bind(myDropzone)
            );

        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("id", $("#id").val());
        });
    }
    };

});