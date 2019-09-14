class Calculator {
    constructor () {
        this.digits = document.querySelectorAll("#number")
        this.actions = document.querySelectorAll("#action")
        this.equals = document.querySelector(".equals")
        this.display = document.querySelector(".display")
        this.currAction = ""
        this.prevAction = ""
        this.equality = ""
        this.wholeNum1 = ""
        this.wholeNum2 = ""
        this.result = ""
        this.mem = ""
        this._init ()
    }

    _init () {
        this._addListeners2Nums ()
        this._addListeners2Acts ()
        this._addListener2Equals ()
    }

    _addListeners2Nums () {
        this.digits.forEach(num => num.addEventListener("click", this._workWithNumbers.bind(this)))
    }

    _addListeners2Acts () {
        this.actions.forEach(act => act.addEventListener("click", this._workWithActions.bind(this)))
    }

    _addListener2Equals () {
        this.equals.addEventListener("click", this._workWithEquals.bind(this))
    }

    _workWithNumbers () {
        this.digit = event.target.dataset.num
        this.wholeNum2 += this.digit
        switch (true) {
            case this.wholeNum2[0] == 0 && (this.wholeNum2[1] > 0 || this.wholeNum2[1] == 0):
                this.display.innerHTML = this.wholeNum2.replace(/^0+/, "")
                break

            case this.wholeNum2.length >= 10:
                this.display.innerHTML = this.wholeNum2.substring(0, 9)
                break

            default:
                this.display.innerHTML = this.wholeNum2
        }
    }

    _nullEverything () {
        this.wholeNum1 = ""
        this.wholeNum2 = ""
        this.result = ""
        this.currAction = ""
        this.prevAction = ""
        this.equality = ""
        this.mem = ""
    }

    _workWithActions () {        
        if (!this.currAction) {
            this.currAction = event.target.dataset.act
        } else {
            this.prevAction = this.currAction
            this.currAction = event.target.dataset.act
            this.mem = ""
        }

        switch (true) {
            case this.currAction == "cancel":
                this._nullEverything ()
                this.display.innerText = "0"
                break

            case this.currAction != "" && this.prevAction == "" && this.wholeNum1 == "":
                this.wholeNum1 = this.wholeNum2
                this.wholeNum2 = ""
                break

            case this.currAction != "" && this.prevAction != "" && this.wholeNum1 != "" && this.result == "":
                this._sendToServer (this.wholeNum1, this.wholeNum2, this.prevAction)
                this.wholeNum2 = ""
                break

            case this.currAction != "" && this.prevAction != "" && this.wholeNum1 != "" && this.result != "":
                this.wholeNum1 = this.result
                this._sendToServer (this.wholeNum1, this.wholeNum2, this.prevAction)
        }
    }

    _workWithEquals () {
        this.equality = event.target.dataset.act
        switch (true) {
            case this.equality == "equals" && this.result != "" && this.mem != "":
                this.wholeNum2 = ""
                this.prevAction = ""
                this._sendToServer (this.result, this.mem, this.currAction)
                break

            case this.equality == "equals" && this.result != "" && this.mem == "":
                this.mem = this.wholeNum2
                this.prevAction = ""
                this._sendToServer (this.wholeNum1, this.mem, this.currAction)
                break

            case this.equality == "equals" && this.result == "":
                this.mem = this.wholeNum2
                this.prevAction = ""
                this._sendToServer (this.wholeNum1, this.mem, this.currAction)
        }
    }

    _sendToServer (num1, num2, action) {
        this.send2calc = `num1=${num1}&num2=${num2}&action=${action}`
        this.xhr = new XMLHttpRequest ()
        this.xhr.open ("POST", "./engine/func.php", true)
        this.xhr.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded")
        this.xhr.send (this.send2calc)
        this.xhr.onreadystatechange = () => {
				if (this.xhr.readyState == 4 && this.xhr.status == 200) {
                    this.display.innerText = this.xhr.responseText.substring(0, 9)
                    this.result = this.display.innerText
				} else {
                    this.display.innerText = "ERR"
                }
        }
    }
}

let calc = new Calculator ()