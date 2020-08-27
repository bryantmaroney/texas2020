class ModalToImage {
    constructor(count) {
        this.count = count;
        this.baseUrl = `${window.location.origin}${window.location.pathname}`;
        this.imgContainer = document.getElementById('canvasImgContainer');
        this.voteImages = {
            'agree-dot': this.imgContainer && this.imgContainer.children[0],
            'disagree-dot': this.imgContainer && this.imgContainer.children[1],
            'skip-dot': this.imgContainer && this.imgContainer.children[2]
        };
        this.background = {
            hf: '#14254c',
            body: '#1a2e5a'
        };
        this.lines = {
            left: {from: 147.36, to: 329.376},
            right: {from: 395.328, to: 578.016},
            sHeight: 127.968,
            height: 40,
            color: '#305387'
        };
        this.ints = {
            left: {from: 159.36},
            right: {from: 408},
            sHeight: 115.296,
            height: 40,
            color: '#305387'
        };
        this.texts = {
            left: {from: 179.36, title: ['End Gerrymandering', 'Vote By Mail', 'Reveal the Writers', 'Modernize Elections', 'Ranking Your Candidates']},
            right: {from: 430.968, title: ['Ban the Barriers', 'Limit the Lobbyists', 'Rethink Registration', 'Clean Up Elections', 'Tune In Texas']},
            sHeight: 112.704,
            height: 40,
            color: '#fff'
        };
        this.votes = {
            left: [108, 93.984],
            right: [359.328, 93.984],
            height: 39,
            wh: 34
        };
        this.width = 677.76;
        this.height = 355.2;
    }
    async createImage() {
        var elem     = document.querySelector('.summary-modal-section'),
            rect     = elem.getBoundingClientRect(),
            canvas   = document.createElement("canvas"), img;

        await this.loadFonts();
        this.ctx        = canvas.getContext("2d");
        this.voteResult = JSON.parse(localStorage.voteResult || '[]');
        canvas.width    = this.width
	    canvas.height   = this.height
	    this.createElement([0, 0, this.width, 70.048], this.background.hf);
	    this.createElement([0, 66.048, this.width, 249.528], this.background.body);
	    this.createElement([0, 66.048 + 246.528, this.width, 43.296], this.background.hf);
	    this.createImg([18.048, 7.296, 639.84, 73.344], 'headerLogoNew.png');
	    this.createImg([24.672, 301.344, 225.984, 41.376], 'summary-footer-logo.png');
	    this.createLines();
	    this.createInts();
	    this.createText();
	    this.createVotes();
	    return new Promise(res => {
	        res(canvas.toDataURL("image/png"));
        })	    
    }
    async loadFonts() {
        await document.fonts.load('10pt "Gothic"')
        await document.fonts.load('10pt "Lato"')
        return new Promise(res => res(true))
    }
    createElement(positions, color) {
        this.ctx.fillStyle = color;
        this.ctx.fillRect(...positions);
    }
    createImg(position, img) {
        let url = img.src !== undefined ? undefined : `${this.baseUrl}assets/images/${img}`;
        if(url) {
            img = document.createElement('img');
            img.src = url;
        }

        this.ctx.drawImage(img, ...position);
    }
    createLines() {
        let type, int;
        for(let i = 0; i < (this.count - 1) * 2; i++) {
            type = i < this.count - 1 ? 'left' : 'right';
            int = i < this.count - 1 ? i : i - this.count + 1;

            this.ctx.beginPath();
            this.ctx.lineWidth = 2;
            this.ctx.lineCap = "butt";
            this.ctx.strokeStyle = this.lines.color;
            this.ctx.moveTo(this.lines[type].from, this.lines.sHeight + int * this.lines.height);
            this.ctx.lineTo(this.lines[type].to, this.lines.sHeight + int * this.lines.height);
            this.ctx.stroke();
        }
    }
    createInts() {
        let type, int;
        for(let i = 0; i < this.count * 2; i++) {
            type = i < this.count ? 'left' : 'right';
            int = i < this.count ? i : i - this.count;
            this.ctx.font = "900 25px Gothic";
            this.ctx.fillStyle = this.ints.color;
            this.ctx.fillText(i + 1, this.ints[type].from - (i > 8 ? 5 : 0), this.ints.sHeight + int * this.ints.height);
        }
    }
    createText() {
        let type, int;
        for(let i = 0; i < this.count * 2; i++) {
            type = i < this.count ? 'left' : 'right';
            int = i < this.count ? i : i - this.count;
            this.ctx.font = "500 15px Lato";
            this.ctx.fillStyle = this.texts.color;
            this.ctx.fillText(this.texts[type].title[int], this.texts[type].from, this.texts.sHeight + int * this.texts.height);
        }
    }
    createVotes() {
        let type, position, img, int;
        this.voteResult.forEach((e, i) => {
            type = i < 5 ? 'left' : 'right';
            int = i < 5 ? i : i - 5;
            position = [this.votes[type][0], this.votes[type][1] + int * this.votes.height, this.votes.wh, this.votes.wh]
            img = this.voteImages[Object.values(e)[0]]
            this.createImg(position, img)
        })
    }
}