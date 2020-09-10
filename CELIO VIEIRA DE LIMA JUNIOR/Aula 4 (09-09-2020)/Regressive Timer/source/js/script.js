class Timer{

    constructor(buttonId = "#timer-button", pauseButtonId = "#pause-button", timerDisplayId = "#timer-display", timerInputId = "#timer-input"){
        this.optPaused  = ["Pause","Play"]
        this.options = ["►", "■"];
        this.counting = false;
        this.time = 0; // Time input in minutes
        this.minutes = 0;
        this.seconds = 0;
        this.hours   = 0;
        this.paused  = false;
        this.configHtmlDom(buttonId, pauseButtonId,timerDisplayId, timerInputId);
    }

    configHtmlDom(buttonId, pauseButtonId, timerDisplayId, timerInputId){
        this.button = $(buttonId);
        this.display = $(timerDisplayId);
        this.input   = $(timerInputId);
        this.pausedButton = $(pauseButtonId);
        this.updateInput();
        this.updateButton();
        this.updatePausedButton();
        this.updateDisplay();
        this.button.click(this.actionStart.bind(this));
        this.pausedButton.click(this.playOrPause.bind(this))
        this.input.keyup(this.setTime.bind(this))
        this.input.click(this.setTime.bind(this))
        this.setTime();
    }

    actionStart(){
        if (!this.time > 0){
            return;
        }
        if (this.counting){
            clearInterval(this.interval);
            this.counting = false;
        }else{
            this.counting = true;
            this.interval = setInterval(this.updateTimer.bind(this), 1000);
        }
        this.makeTimer();
        this.updateInput();
        this.updateButton();
        this.updatePausedButton();
        this.updateDisplay();
    }

    playOrPause(){
        if (!this.counting){
            return;
        }
        if (this.paused){
            this.paused = false;
        }else{
            this.paused = true;
        }this.updatePausedButton();
    }

    makeTimer(){
        this.hours   = (this.time / 60);
        this.minutes = ((this.hours - parseInt(this.hours))*60);
        if (String(this.time).includes(".")){
            this.seconds = (this.minutes - parseInt(this.minutes))*60;
        }else{
            this.seconds = 0;
        }
        this.hours = parseInt(this.hours);
        this.minutes = parseInt(this.minutes);
        this.seconds = parseInt(this.seconds);
    }

    setTime(){
        if (parseInt(this.input.val()) >= parseInt(this.input.attr("min")) && parseInt(this.input.val()) <= parseInt(this.input.attr("max"))){   
            this.time = this.input.val();
        }else{
            this.time = 0;
        }
        this.makeTimer();
        this.updateDisplay();
    }

    clockLogic(){
        this.seconds -= 1;
        if (this.seconds < 0){
            this.minutes -= 1;
            this.seconds = 59;            
        }
        if (this.minutes < 0){
            this.minutes = 59;
            this.hours -= 1;
        }
    }

    updateTimer(){
        if (this.paused){
            return;
        }
        this.clockLogic();
        if (this.hours == 0 && this.minutes == 0 && this.seconds == 0){
            this.actionStart();
            alert("The time has just ended up.");
        }else{
            this.updateDisplay();
        }
     }

     updateInput(){
         if (this.counting){
            this.input.attr("disabled", true);
         }else{
             this.input.attr("disabled", false);
         }
     }

     updateButton(){
        if(this.counting){
            this.button.text(this.options[1]);
        }else{
            this.button.text(this.options[0]);
        }
     }

     updatePausedButton(){
         if (!this.counting){
             this.pausedButton.attr("disabled",true);
             this.paused = false;
             this.pausedButton.text(this.optPaused[1]);
        }else{
            this.pausedButton.attr("disabled", false);
        }
         if (!this.paused){
            this.pausedButton.text(this.optPaused[0]);
         }else{
            this.pausedButton.text(this.optPaused[1]);
         }
     }

     updateDisplay(){
        this.display.text(`${pad(this.hours, 2)}:${pad(this.minutes, 2)}:${pad(this.seconds, 2)}`);
     }
}

function pad(n, width) { 
    /* Roubei esta função do StackOverflow 
    apenas para embelezar a bagaça.*/
    n = n + ''; 
    return n.length >= width ? n :
        new Array(width - n.length + 1).join('0') + n; 
}

