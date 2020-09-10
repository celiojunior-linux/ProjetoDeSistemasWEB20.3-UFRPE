class InteractiveGallery{

    constructor(galleryId, gallerySize, autoScroll=true,  sleep=3000, galleryExtension = "jpg"){
        this.gallery = $(galleryId);
        this.leftButton  = this.gallery.children("span").children(".left-button");
        this.rightButton = this.gallery.children("span").children(".right-button");
        this.counter = this.gallery.children(".current");
        this.image = this.gallery.children("img");
        this.selected = 0;
        this.path = `./assets/${galleryId.replace(/#/,"")}/img`;
        this.gallerySize = gallerySize - 1;
        this.extension  = galleryExtension;
        this.sleep = sleep
        this.autoScroll = autoScroll;
        this.setImage();
        this.configureButtons();
        this.configureAutoScroll();
    }

    setImage(selected = null){
        if (selected){
            this.selected = selected;
        }
        this.counter.text(`${this.selected+1}/${this.gallerySize+1}`);
        this.image.attr("src", `${this.path}/${this.selected}.${this.extension}`);
        this.image.removeClass("slide");
        setTimeout(() => {
            this.image.addClass("slide");
        }, 100);
    }
    
    navigatePrevious(reset=false){
        if (reset){
            this.resetAnimation();
        }
        this.selected -= 1;
        if (this.selected < 0){
            this.selected = this.gallerySize;
        }
        this.setImage();
    }

    navigateNext(reset=false){
        if(reset){
            this.resetAnimation();
        }
        this.selected += 1;
        if (this.selected > this.gallerySize){
            this.selected = 0;
        }
        this.setImage();
    }

    resetAnimation(){
        clearInterval(this.interval);
        this.configureAutoScroll();
    }

    configureButtons(){
        this.leftButton.click(this.navigatePrevious.bind(this, true));
        this.rightButton.click(this.navigateNext.bind(this, true));
    }

    configureAutoScroll(){
        if (this.gallerySize > 1 && this.autoScroll){
            this.interval = setInterval(this.updateImage.bind(this),this.sleep)
        }
    }

    updateImage(){
        this.navigateNext();
    }
}
