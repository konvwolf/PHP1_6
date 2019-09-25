class Comments {
    constructor () {
        this.formWidth = document.querySelector(".comments_form").offsetWidth
        this.commsWidth = document.querySelector(".user_comm").offsetWidth
        this._centerForm()
    }

    _centerForm () {

        document.querySelector(".comments_form").style.marginLeft = "calc(50% - " + this.formWidth / 2 + "px"
        document.querySelectorAll(".user_comm").forEach (item => item.style.marginLeft = "calc(50% - " + this.commsWidth / 2 + "px")
    }
}

let comments = new Comments ();