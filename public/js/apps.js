if (document.getElementById('slider')) {
    let slider1 = new Slider('.slide-item');
}

document.addEventListener('DOMContentLoaded', (e) => {
    if (typeof(document.getElementsByTagName('textarea')) !== undefined) {
        let wysiwyg = new Wysiwyg('#post', ['advlist', 'autolink', 'preview', 'fullscreen', 'emoticons']);  
    };
})

if (document.querySelector('.delete-content')) {
    document.querySelector('.delete-content').addEventListener('click', () => {
        confirm('Voulez-vous vraiment supprimer ?') ? true : false;
    });
}

if (document.querySelector('.validate-comment')) {
    document.querySelector('.validate-comment').addEventListener('click', () => {
        confirm('Voulez-vous vraiment autoriser ce message ?') ? true : false;
    });
}

if (document.querySelector('.update-post')) {
    document.querySelector('.update-post').addEventListener('click', () => {
        confirm('Voulez-vous vraiment modifier ce chapitre ?') ? true : false;
    });
}
