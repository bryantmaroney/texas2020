class CreateImg {
    constructor(data) {
        this.choice = data;
        this.baseUrl = `${window.location.origin}${window.location.pathname}`;
        this.images = document.getElementById('canvasImgContainer').children;
        this.width = 1600.032;
        this.height = 837.312;
        this.count = 4;
        this.containers = {
            startW: 142.656,
            startH: 271.968,
            width: 322.656,
            height: 385.344,
            distance: 26.688
        };
        this.districtImages = {
            startW: 166.656,
            startH: 504,
            width: 115.968,
            height: 177.312,
            distance: 230.624
        };
        this.userName = {
            startW: 303.98,
            startH: 433.344,
            distance: 349.344,
            color: "#fff"
        };
        this.districtsName = {
            startW: 309.312,
            startH: 554.688,
            distance: 338.688,
            color: "#fff",
            vDistance: 35.312
        };
        this.borders = {
            startW: 305.376,
            startH: 294.624,
            r: 90,
            borderW: 9,
            distance: 349.344,
            color: '#2CA107'
        };
        this.icons = {
            startW: 352.032,
            startH: 333.312,
            width: 41.376,
            height: 41.376,
            distance: 308.968
        };
        this.bImages = {
            startW: 218.344,
            startH: 208.624,
            width: 174.624,
            height: 174.624,
            distance: 174.5
        }
    }
    async createImage() {
        var canvas   = document.createElement("canvas"), img;

        this.ctx        = canvas.getContext("2d");
        canvas.width    = this.width
        canvas.height   = this.height

        await this.loadFonts();
        this.createContainers(this.icons, [this.images[2]]);
        this.createElement([0, 0, this.width, this.height], '#F3F5FB');
        this.createElement([0, 715.968, this.width, 122.688], '#FFF');
        this.createImg([218.688, 55.968, 1188, 112.032], this.images[0]);
        this.createImg([138.624, 700.032, 1296, 103.968], this.images[3]);
        this.createContainers(this.containers, [this.images[1]]);
        this.createBorderImages(this.bImages, this.choice.userImg);
        this.createBorders(this.borders);
        this.createContainers(this.icons, [this.images[2]], false);
        this.createContainers(this.districtImages, this.choice.districImg);
        this.createText(this.userName, 'center', this.choice.userName);
        this.createText(this.districtsName, 'start', this.choice.districtName);

        return new Promise(res => {
            res(canvas.toDataURL('image/jpeg'));
        })
    }
    async loadFonts() {
        await document.fonts.ready
        return new Promise(res => res(true));
    }
    createElement(positions, color) {
        this.ctx.fillStyle = color;
        this.ctx.fillRect(...positions);
    }
    createBorderImages(data, img) {
        for(let i = 0; i < this.count; i++) {
            this.ctx.save();
            this.roundedImage(data.startW + (i * (data.distance + data.width)), data.startH, data.width, data.height, data.width / 2 + 11);
            this.ctx.clip();
            this.createImg([data.startW + (i * (data.distance + data.width)), data.startH, data.width, data.height], img[i])
            this.ctx.restore();
        }
    }
    roundedImage(x,y,width,height,radius){
        this.ctx.beginPath();
        this.ctx.moveTo(x + radius, y);
        this.ctx.lineTo(x + width - radius, y);
        this.ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
        this.ctx.lineTo(x + width, y + height - radius);
        this.ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
        this.ctx.lineTo(x + radius, y + height);
        this.ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
        this.ctx.lineTo(x, y + radius);
        this.ctx.quadraticCurveTo(x, y, x + radius, y);
        this.ctx.closePath();
    }
    createImg(position, img, type = '') {
        let url = img ? img.src !== undefined ? undefined : img : undefined;

        if(url) {
            img = document.createElement('img');
            img.src = url;
        } else if(!img) {
            img = this.images[4];
        }

        this.ctx.drawImage(img, ...position);
    }
    createContainers(data, img, create = true) {
        let position;
        for(let i = 0; i < this.count; i++) {
            if(this.choice.userImg[i] || create){
                position = [data.startW + (i*(data.distance + data.width)), data.startH, data.width, data.height]
                this.createImg(position, img[i] ? img[i] : img[0])    
            }
        }
    }

    createBorders(data) {
        for(let i = 0; i < this.count; i++) {
            this.ctx.beginPath();
            this.ctx.arc(data.startW + (i * data.distance), data.startH, data.r, 0, 2 * Math.PI);
            this.ctx.lineWidth = data.borderW;
            this.ctx.strokeStyle = this.choice.userImg[i] ? data.color : '#ffffff00';
            this.ctx.stroke();
        }
    }

    createText(data, align, textArray) {
        textArray.forEach((e, i) => {
            this.ctx.font = "700 30px Lato";
            this.ctx.fillStyle = data.color;
            this.ctx.textAlign = align;

            if(e instanceof Array) {
                this.ctx.fillText(e[0], data.startW + (i * data.distance), data.startH);
                this.ctx.fillText(e[1], data.startW + (i * data.distance), data.startH + data.vDistance);
            } else {
                this.ctx.fillText(e, data.startW + (i * data.distance), data.startH);
            }
        })
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