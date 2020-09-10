class InteractiveGallery{

    constructor(galleryId, gallerySize, galleryExtension = "jpg"){
        this.gallery = $(galleryId);
        this.leftButton  = this.gallery.children("span").children(".left-button");
        this.rightButton = this.gallery.children("span").children(".right-button");
        this.counter = this.gallery.children(".current");
        this.image = this.gallery.children("img");
        this.selected = 0;
        this.galleryLenght = 4
        this.path = `./assets/${galleryId.replace(/#/,"")}/img`;
        this.gallerySize = gallerySize - 1;
        this.extension  = galleryExtension;
        this.setImage();
        this.configureButtons();
        this.configureAutoPass();
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
            clearInterval(this.interval);
            this.configureAutoPass();
        }
        this.selected -= 1;
        if (this.selected < 0){
            this.selected = this.gallerySize;
        }
        this.setImage();
    }

    navigateNext(reset=false){
        if (reset){
            clearInterval(this.interval);
            this.configureAutoPass();
        }
        this.selected += 1;
        if (this.selected > this.gallerySize){
            this.selected = 0;
        }
        this.setImage();
    }

    configureButtons(){
        this.leftButton.click(this.navigatePrevious.bind(this, true));
        this.rightButton.click(this.navigateNext.bind(this, true));
    }

    configureAutoPass(){
        this.interval = setInterval(this.updateImage.bind(this),3000)
    }

    updateImage(){
        this.navigateNext();
    }
}