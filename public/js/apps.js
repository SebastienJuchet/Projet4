if (document.getElementById('slider')) {
    let slider1 = new Slider('.slide-item');
}

document.addEventListener('DOMContentLoaded', (e) => {
    let wysiwyg = new Wysiwyg('#create-chapter');  
});

function deleteManagmentComment() {
    if (confirm('Voulez-vous vraiment supprimer ce message ?')) {
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
