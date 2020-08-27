window.Dots = {
    dotsContainer: document.querySelectorAll('.desktop-dots'),
    modalItems: document.querySelectorAll('.vote-item'),
    maxAllow: 15,
    baseUrl: `${window.location.origin}${window.location.pathname}`,
    checkCount: function() {
        return document.querySelector('.item.defItem') ? 11 : 10;
    },
    onLoad: function() {
        this.setVariables();

        if(Dots.checkCount() != 11) {
            this.dots[0].classList.add('selected-dot')
            this.mobileDots[0].classList.add('selected-dot')
        }
        localStorage.choiceData = '[]';
        localStorage.currentChoice = '[]';
        localStorage.userData = '[]';
        this.onClickDots();
        this.checkTime();
        this.setDots();
        this.bindEvent();
        this.checkResetButton();
    },
    checkResetButton: function() {
        var res = JSON.parse(localStorage.voteResult || '[]'),
            rButtons = document.querySelectorAll('.resetVoteAnswers');

        Object.values(rButtons).forEach(e => {
            e.style.display = res.length ? 'inline' : 'none';
        })
    },
    post: function(data, action) {
        var myHeaders = new Headers().append("Content-Type", "application/x-www-form-urlencoded"),
            urlencoded = new URLSearchParams(), requestOptions;

        for(key in data) {
            urlencoded.append(key, data[key])
        }

        requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            redirect: 'follow'
        };

        return new Promise((res, rej) => {
            fetch(`${this.baseUrl}${action}`, requestOptions)
            .then(response => response.text())
            .then(result => res(result))
            .catch(error => rej('error', error));
        })
    },
    setScripts: function() {
        // var script = document.createElement('script');

        // script.src = `${this.baseUrl}assets/js/html2canvas.js`
        // document.querySelector('head').appendChild(script);
        // script.src = `${this.baseUrl}assets/js/jquery_migrate.js`;
        // document.querySelector('head').appendChild(script);
    },
    setVariables: function() {
        this.dots = document.querySelectorAll('.desktop-dots')[1].children
        this.mobileDots = document.querySelectorAll('.desktop-dots')[0].children
    },
    setDots: function() {
        let voteResult = JSON.parse(localStorage.getItem('voteResult')) || [];

        voteResult.forEach(e => {
            if(e) {
                document.querySelector(`[data-desk-name=${Object.keys(e)[0]}]`).classList.add(Object.values(e)[0])
                document.querySelector(`[data-mobile-name=${Object.keys(e)[0]}]`).classList.add(Object.values(e)[0])
            }
        })

        voteResult.filter(e => e).length === 10 && this.appendSummaryLink();
    },
    setActive: (index) => {
        index--;
        
        if(document.querySelectorAll('.selected-dot').length) {
            document.querySelectorAll('.selected-dot').forEach(e => e.classList.remove('selected-dot'))
        }
        !Dots.dots && Dots.setVariables();
        Dots.dots[index] && Dots.dots[index].classList.add('selected-dot');
        Dots.mobileDots[index] && Dots.mobileDots[index].classList.add('selected-dot');
    },
    setStorageData: function(key, className) {
        let currentVote = {},
            voteResult  = JSON.parse(localStorage.getItem('voteResult') || '[]'),
            index       = Object.values(this.dots).findIndex(e => {
                return e.children[0].getAttribute('data-desk-name') === key;
            });

        currentVote[key] = className;
        voteResult[index] = currentVote;
        localStorage.setItem('voteResult', JSON.stringify(voteResult));
        if(voteResult.filter(e => e).length === 10) {
            !localStorage.answerTime && localStorage.setItem('answerTime', new Date().getTime());
            this.appendSummaryLink();
            this.modalAction('open');
            this.createImage();
        }
    },
    createImage: async function() {
        var img;

        this.mToImg = this.mToImg ? this.mToImg : new ModalToImage(5);
        try{
            img = await this.mToImg.createImage();
            data = await this.post({'base64': img}, 'save-vote-img');
            data = JSON.parse(data);

            document.getElementById('voteIndex').dataset.id = data.indexName;
        } catch(e) {
            console.log(e)
        }
    },
    checkTime: function(){
        var currentTime = new Date().getTime(),
            timeDiffer  = currentTime - (+localStorage.answerTime || currentTime);

       if(timeDiffer/60000 >= this.maxAllow) {
           localStorage.setItem('voteResult', '[]');
           localStorage.removeItem('answerTime');
           this.cleareDotsClases();
       }
    },
    cleareDotsClases: function() {
        Object.values(this.dots).forEach((e, i) => {
            if(e.children[0]) e.children[0].className = '';
            if(Object.values(this.mobileDots)[i]) Object.values(this.mobileDots)[i].children[0].className = '';
        })

        this.checkResetButton();

        document.querySelectorAll('.desktop-dots')[0] &&
        document.querySelectorAll('.desktop-dots')[0].nextElementSibling &&
        document.querySelectorAll('.desktop-dots')[0].nextElementSibling.remove()
        document.querySelectorAll('.desktop-dots')[1] &&
        document.querySelectorAll('.desktop-dots')[1].nextElementSibling &&
        document.querySelectorAll('.desktop-dots')[1].nextElementSibling.remove()
    },
    userVote: function(type, key) {
        let classes = {
            agree: 'agree-dot',
            disagree: 'disagree-dot',
            skip: 'skip-dot'
        }, element = [document.querySelector(`[data-desk-name="${key}"]`), document.querySelector(`[data-mobile-name="${key}"]`)];

        this.checkTime();
        this.setStorageData(key, classes[type]);
        this.checkResetButton();
        element[0].classList.remove(...element[0].classList)
        element[1].classList.remove(...element[1].classList)
        element[0].classList.add(classes[type]);
        element[1].classList.add(classes[type]);
    },
    appendSummaryLink: function() {
        let html = jQuery(`
            <div class="summary-container">
                <img src="${site_url}assets/images/summaryIcon.png" alt="">
                <span id="openSummaryModal">View My Results</span>
            </div>
        `);

        if(!jQuery('.summary-container').length) {
            jQuery(this.dotsContainer).after(html);
        }
    },
    modalAction: function(type) {
        let votes = JSON.parse(localStorage.voteResult),
            data  = {
                'agree-dot': {
                    img: 'summary-agree.png',
                    color: '#00A200'
                },
                'disagree-dot': {
                    img: 'summary-disagree.png',
                    color: '#D50008'
                },
                'skip-dot':{
                    img: 'summary-skip.png',
                    color: '#778AA8'
                }
            }, img, span;
        type = type === 'open' ? 'flex' : 'none';

        if(type === 'flex') {
            this.modalItems.forEach((e, i) => {
                img = e.querySelector('img');

                if(Object.values(votes[i])[0] !== 'skip-dot') {
                    img.parentNode.children[1] && img.parentNode.children[1].remove();
                    img.style.display = 'inline';
                    img.setAttribute('src', `assets/images/${data[Object.values(votes[i])[0]].img}`);
                } else {
                    span = document.createElement('span')
                    span.innerText = 'N/A';
                    span.style.marginLeft = 0;
                    img.style.display = 'none';
                    img.parentNode.children[1] && img.parentNode.children[1].remove();
                    img.parentNode.appendChild(span)
                }

                img.parentNode.style.backgroundColor = data[Object.values(votes[i])[0]].color;
            })
            document.body.style ='overflow-y:hidden';
            document.body.style.position ='fixed';
        }
        else{
            document.body.style ='overflow-y:auto';
            document.body.style.position ='relative';
        }

        document.getElementById('summaryModal').style.display = type;

    },
    changeSlide: function(id, type) {
        let owl = jQuery(`#${type}`).owlCarousel();
        
        id = this.checkCount() === 11 ? id : id - 1;
        owl.trigger('to.owl.carousel', [id, 500]);
    },
    onClickDots: function() {
        var urls = [
            'EndGerrymandering', 'VoteByMail',
            'RevealtheWriters', 'ModernizeElections',
            'RCV', 'BantheBarriers',
            'LimittheLobbyists', 'RethinkRegistration',
            'CleanUpElections', 'TuneinTexas',
            'LearnYourDistricts'
        ];

        Object.values(this.dots).forEach(e => {
            e.addEventListener('click', event => {
                this.changeSlide(+event.currentTarget.getAttribute('data-id'), 'carusel-desktop')
            })
        })

        Object.values(this.mobileDots).forEach(e => {
            e.addEventListener('click', event => {
                this.changeSlide(+event.currentTarget.getAttribute('data-id'), 'carusel-mobile')
            })
        })

        if(localStorage.url && urls.indexOf(localStorage.url) !== -1) {
            Object.values(this.mobileDots)[urls.indexOf(localStorage.url)].click();
            Object.values(this.dots)[urls.indexOf(localStorage.url)].click();
            localStorage.removeItem('url');
        }
    },
    resetAnswers: function() {
        var selectedAnswers = document.querySelectorAll('.selectedAnswer');

        Object.values(selectedAnswers).forEach(e => {
            e.className = e.className.replace(/[ ].+/g, '')
        })

        localStorage.voteResult = '[]';
        this.cleareDotsClases();
    },
    openPrivacy: function(element) {
        let modal = document.getElementById('footerModal');
        modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
        let body = document.getElementsByTagName("body")[0];
        body.style ='overflow-y:hidden';
    },
    openTerms: function(element){
        let modal = document.getElementById('TermsModal');
        modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
        let body = document.getElementsByTagName("body")[0];
        body.style ='overflow-y:hidden';
    },
    closePrivacy: function(element) {
        let modal = document.getElementById('footerModal');
        modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
        let body = document.getElementsByTagName("body")[0];
        body.style ='overflow-y:auto';
    },
    closeTerms: function(element){
        let modal = document.getElementById('TermsModal');
        modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
        let body = document.getElementsByTagName("body")[0];
        body.style ='overflow-y:auto';
    },
    bindEvent: function() {
        var events = {
            resetAnswers: {
                element: 'resetVoteAnswers'
            },
            openPrivacy: {
                element: 'privacy_popup'
            },
            closePrivacy: {
                element: 'closePrivacyModal'
            },
            openTerms:{
                element: 'terms_popup'
            },
             closeTerms: {
                element: 'closeTermsModal'
            },
        }

        document.addEventListener('click', (e) => {
            for(let func in events) {
                if(e.target.classList.contains(events[func].element)) {
                    Dots[func].call(Dots, e.target);
                }
            }
        })
    }
}

jQuery(document).ready(function() {
    setTimeout(() => {
        Dots.onLoad();
    })
})
