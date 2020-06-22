class Slider {
    constructor(id) {
        
        this.slideItem = document.querySelectorAll(id);
        this.index = 0;
        this.initiAutoSlide();
    }

    nextPicture() {
        this.slideItem[this.index].classList.toggle('active');
        this.index++;
        if (this.index == this.slideItem.length) {
            this.index = 0;
        }
        this.slideItem[this.index].classList.add('active');
    }

    initiAutoSlide() {
        setInterval( () => {
            this.nextPicture();
        }, 4000);
    }
}
