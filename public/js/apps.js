if (document.getElementById('slider')) {
    let slider1 = new Slider('.slide-item');
}

document.addEventListener('DOMContentLoaded', (e) => {
    if (typeof(document.getElementsByTagName('textarea')) !== undefined) {
        let wysiwyg = new Wysiwyg('#chapter', ['advlist', 'autolink', 'preview', 'fullscreen', 'emoticons']);  
    };
})

function deleteContent() {
    return confirm('Voulez-vous vraiment supprimer ?') ? true : false;
};

function validateManagmentComment() {
    return confirm('Voulez-vous vraiment autoriser ce message ?') ? true : false;
};

function validateUpdateChapter() {
    return confirm('Voulez-vous vraiment modifier ce chapitre ?') ? true : false;
};
