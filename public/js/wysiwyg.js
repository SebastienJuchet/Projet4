class Wysiwyg {
    constructor (id) {
    
        this.id = id;
        this.initWysiwyg();
    }

    initWysiwyg() {
        tinymce.init({
            selector: 'textarea' + this.id,
            language: 'fr_FR',
            plugins: 'bbcode'
        });
    }
}