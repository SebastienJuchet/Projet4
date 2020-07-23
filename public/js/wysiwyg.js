class Wysiwyg {
    constructor (id, plugins) {
    
        this.plugins = plugins.join(' ');
        this.id = id;
        this.initWysiwyg();
    }

    initWysiwyg() {
        tinymce.init({
            selector: 'textarea' + this.id,
            language: 'fr_FR',
            plugins: this.plugins,
            menubar: 'view file edit format',
            toolbar: 'fullscreen | undo redo | bold italic | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'outdent indent | numlist bullist | emoticons',
        });
    }
}