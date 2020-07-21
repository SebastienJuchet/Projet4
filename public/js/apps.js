if (document.getElementById('slider')) {
    let slider1 = new Slider('.slide-item');
}

document.addEventListener('DOMContentLoaded', (e) => {
    let wysiwyg = new Wysiwyg('#chapter');  
});

function deleteContent() {
    if (confirm('Voulez-vous vraiment supprimer ?')) {
        return true;
    } else {
        return false;
    }
};

function validateManagmentComment() {
    if (confirm('Voulez-vous vraiment autoriser ce message ?')) {
        return true;
    } else {
        return false;
    }
};

function validateUpdateChapter() {
    if (confirm('Voulez-vous vraiment modifier ce chapitre ?')) {
        return true;
    } else {
        return false;
    }
};
