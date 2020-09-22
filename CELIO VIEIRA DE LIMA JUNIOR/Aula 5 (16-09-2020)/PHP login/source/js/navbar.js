class ResponsiveNavBar{

    constructor(id, btid){
        this.panel = $(id);
        this.hidden = true;
        this.button = $(btid);
        this.button.click(this.display.bind(this, true));
        setInterval(this.updateDisplay.bind(this, true), 100);
    }

    display(){
        this.hidden = !this.hidden;
        if (this.hidden){
            this.panel.css("display", "none");
        }else{
            this.panel.css("flex-direction","column");
            this.panel.css("display", "flex");
        }
    }

    updateDisplay(){
        if ($(document).width() > 768){
            this.panel.css("display", "flex");
            this.hidden = false;
        }
    }
}

var navbar = new ResponsiveNavBar("#panel", "#menu-button");