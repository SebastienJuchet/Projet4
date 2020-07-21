class Wysiwyg {
    constructor (id) {
    
        this.id = id;
        this.initWysiwyg();
    }

    initWysiwyg() {
        tinymce.init({
            selector: 'textarea' + this.id,
            language: 'fr_FR',
            plugins: 'advlist autolink preview fullscreen emoticons',
            menubar: 'view file edit format',
            toolbar: 'fullscreen | undo redo | bold italic | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'outdent indent | numlist bullist | emoticons',
        });
    }
}