class Script {
    constructor(count) {
        this.baseUrl = document.getElementById('baseUrl').value;
        this.bindEvents();
        this.commentModal = document.getElementById('comment_modal');
        this.buttons = Object.values(document.querySelectorAll('.choose_candidate'));
        this.choice = [];
        this.infoModalData = [
            {
                problem: 'Every 10 years after a census, our elected officials, in both parties, draw district lines around voters to skew elections in their favor.',
                solution: '<b> END GERRYMANDERING</b> by establishing a non-partisan, independent redistricting commission without conflicts of interest and making redistricting an open and fair process.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/deskCard1Beck_435_140_747ac28e56384dbc8609f6473ca03a91.png`,
                name: 'end_gerry_answer'
            },
            {
                problem: 'Current restrictions on absentee voting prevent many Texans from voting. This year an unprecedented number will be affected. Voters should never be forced to choose between their right to vote and their health and the health of others. ',
                solution: '<b>VOTE BY MAIL</b>  should be an option available (since we can Register to Vote by mail) to every Texan, not just those that meet specific criteria. Expanding the existing practice will guarantee fair, convenient, and safe elections for everyone.</p>',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard2back_optimized_435_150_15c949e516601dc4378c342bdd270182.png`,
                name: 'vote_by_mail_answer'
            },
            {
                problem: 'Corporations have created “Bill Factories” where they write one bill, then create copies for individual states, which legislators pass while concealing the origins and authorship from the public.',
                solution: '<b>REVEAL THE WRITERS</b> before bills are brought to a vote. Knowing who will benefit from the passage of a law should be transparent to voters and legislators.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard3back_optimized_435_160_143f2fe46bba96be066f6c33f1b410ea.png`,
                name: 'reval_writers_answer'
            },
            {
                problem: 'Our outdated voter registration system results in errors, inefficiencies and wasted taxpayer dollars that fuel partisan disputes over the integrity of voter rolls.',
                solution: '<b>RETHINK REGISTRATION</b> by implementing Automatic, Online, and Same Day Registration to ensure that every eligible citizen can register to vote in a convenient, fair, secure, and less costly way.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard8back_optimized_435_145_c8d48dfb2ab78e1086bb8cf84e801072.png`,
                name: 'reth_reg_answer'
            },
            {
                problem: 'Paid lobbyists influence our elected officials with campaign donations, and lucrative job offers after they leave office. In exchange, while in office, politicians pass laws that favor the special interests of lobbyists.',
                solution: '<b>LIMIT THE LOBBYISTS </b> by prohibiting paid lobbyists from donating to —  or fundraising for —  incumbents and candidates and prohibit politicians from accepting paid positions as private sector lobbyists.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard7back_optimized_435_170_fb484b40c7f35ee3c681e7816029e5cc.png`,
                name: 'limit_lob_answer'
            },
            {
                problem: 'Malfunctions and vulnerabilities plague our archaic voting systems, leaving Texans with no paper backup and no way to verify the accuracy and security of our vote.',
                solution: '<b>MODERNIZE ELECTIONS</b> with new standardized voting systems and security-enhanced machines that generate a paper trail. Perform random recounts to verify the integrity of voting systems and our votes.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard4back_optimized_435_140_04c03464d09079a847fb9c3a4d2265de.png`,
                name: 'modern_election_answer'
            },
            {
                problem: `Conventional elections create party polarization and leave voters dissatisfied with their choice of candidates and "winners" who didn't receive majority support.`,
                solution: '<b>RANKING YOUR CANDIDATES</b> will reduce party polarization. Giving voters more choices without the "spoiler effect" will promote positive campaigning, increase voter satisfaction, and eliminate costly runoffs as election victories require a majority vote.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard5back_optimized_435_170_84970f7b3a5ef864debf9fc04046132e.png`,
                name: 'rank_candidate_answer'
            },
            {
                problem: `The decades-long decline in public engagement has contributed to a decline in the public's influence over which policies our representatives enact and whose interests are served.`,
                solution: '<b>TUNE in TEXAS</b> by creating opportunities to involve citizens in the political process. Programs aimed at informing the public and inviting them to collaborate with their representatives empower constituents and builds trust in our democracy.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/optimized_new/mobCard10back_optimized_435_190_80822463d68b59d5f575f6067189f22b.png`,
                name: 'tune_in_texas_answer'
            },
            {
                problem: 'Candidates need access to deep-pocketed donors  to run for office. As a result, those who are elected typically serve those wealthy donors rather than the people they represent.',
                solution: '<b>CLEAN UP ELECTIONS</b> by adopting small donor programs that would allow for a greater diversity of candidates and more competitive races.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/scaled/back9_scaled.png`,
                name: 'clean_up_answer'
            },
            {
                problem: 'Polling location closures, limited polling options, and restrictive polling legislation create barriers for many Texans, denying them equal access to exercise their right to vote.',
                solution: '<b>BAN THE BARRIERS</b> that prevent suburban, rural, assisted living and college communities from conveniently voting. Overturn laws like the statewide closure of all temporary polling locations which resulted in unrealistic travel distances and unreasonably long lines for many Texas voters.',
                img: `${this.baseUrl.replace('candidatesearch/', '')}assets/images/mobCard6back.png`,
                name: 'ban_barriers_answer'

            }
        ]
        this.districtsQueue = ['us_senate', 'us_house', 'texas_house', 'texas_senate'];
        this.toNext = true;

        if(window.location.pathname.includes('step1')) {
            this.step1Init()
        } else if(window.location.pathname.includes('step2')) {
            this.step2Init()
        } else {
            this.indexInit();
        }
    }

    indexInit() {
        localStorage.choiceData = '[]';
        localStorage.currentChoice = '[]';
        localStorage.userData = '[]';
    }

    step1Init() {
        this.setShareDistricts();
        this.setChoices();
        localStorage.existCount = document.getElementById('countData').value;
        document.querySelector('.reset_choices').style.display = JSON.parse(localStorage.choiceData || '[]').filter(e => e).length ? 'inline' : 'none';
        if(+localStorage.existCount === JSON.parse(localStorage.choiceData || '[]').filter(e => e).length) {
            document.querySelector('.shareChoices').style.display = 'inline';
        }
    }

    setChoices() {
        localStorage.choiceData && JSON.parse(localStorage.choiceData).forEach((e, i) => {
            let element = document.querySelectorAll(`.select_candidate[data-id="${i}"`)[e];
            element && this.chooseStep2Candidate(element);
        })
    }

    setShareDistricts() {
        let images = Object.values(document.getElementById('districtImgContainer').children),
            districImg = [],
            districtName = [], name;

        images.forEach((e, i) => {
            name = i === 0 ? 'U.S. Senate' : i === 1 ? 'U.S. House' : i === 2 ? 'Texas House' : 'Texas Senate';
            districImg.push(e);
            districtName.push(name.split(' '));
        });

        this.choice = {
            districImg,
            districtName
        }
    }

    step2Init() {
        localStorage.districtId = this.getDistrictIndex();
        this.currentDistrict = this.districtsQueue[this.getDistrictIndex()];
        this.setCandidateInfo();
        this.setStep2Choices(this.getDistrictIndex());
        this.setShareDistricts();
    }

    setCandidateInfo() {
        this.candidatesInfo = Object.values(document.querySelectorAll('.step2_desktop th'));
        this.candidatesInfo.shift();
        this.candidatesInfoMobile = Object.values(document.querySelectorAll('.step2_mobile th'));
    }
    
    httpGet(url) {
        return new Promise(res => {
            fetch(url)
            .then(response => response.json())
            .then(data => res(data));
        })
    }

    post(data, action) {
        var myHeaders = new Headers().append("Content-Type", "application/x-www-form-urlencoded"),
            urlencoded = new URLSearchParams(), requestOptions;

        for(let key in data) {
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
    }

    setStorageData(id) {
        let element = document.querySelector(`.select_candidate.higlight[data-id="${id}"]`);

        id = element ? element.parentElement.dataset.id : false;
        localStorage.setItem('id', id);
    }
    
    goToStep3 (element) {
        this.setStorageData(element.dataset.id)
        window.location.assign(`${this.baseUrl}step2/${element.dataset.type ? element.dataset.type : element.parentElement.dataset.type}`);
    }

    openCandidateModal(element) {
        var index        = element.dataset.clickIndex,
            modalElement = document.getElementById('openCommentsModal'),
            modalTexts   = document.querySelectorAll('.comment_body'),
            modalHeader  = document.getElementById('comment_modal').querySelector('.modal-header'),
            imgs         = {agree: 'brainer_icon1.png', disagree: 'brainer_icon2.png', neither: 'N/A'}, type, span, img, candidateInfo;

        Object.values(document.querySelectorAll(`input[data-index="${index}"]`)).forEach(e => {
            span           = modalTexts[+e.dataset.num].querySelector('[data-id]');
            candidateInfo  = this.candidatesInfo[+e.dataset.index];
            
            modalHeader.querySelector('.comment_header_name > h5').innerText = candidateInfo.querySelector('.candidate_title').innerText;
            modalHeader.querySelector('.comment_header_img > img').src = candidateInfo.querySelector('.candidate_img > img').src;
            span.innerHTML = '';

            if(e.dataset.type !== 'neither') {
                img = document.createElement('img');
                img.src = `${this.baseUrl}assets/images/${imgs[e.dataset.type]}`;
                span.appendChild(img);
            } else {
                span.innerHTML = imgs[e.dataset.type];
            }

            modalTexts[e.dataset.num].querySelector('p').innerText = e.value.replace(/^ +/g, '') ? e.value : 'No comment.';
        });

        modalElement.click();
    }
    
    toStep2(element) {
        window.location.assign(`${this.baseUrl}step1`);
    }

    toTexas2020(element) {
        var url_arr = this.baseUrl.split('/')
        url_arr.pop()
        url_arr.pop()
        var to_url = url_arr.join('/')

        window.location.assign(to_url);
    }
    
    createIcon() {
        return new DOMParser()
            .parseFromString('<span class="tick"><i class="fa fa-check" aria-hidden="true"></i></span>', 'text/html')
            .querySelector('span');
    }
    
    removeSelected(selected, className) {
        if(selected) {
            selected.classList.remove(className);
            switch(className) {
                case 'highlight':
                    selected.children[1].remove();
                break;
                case 'active':
                    selected.children[0].innerText = selected.classList.contains('desktop_choose') ? 'Choose' : 'Choose This Candidate';
                break;
            }
            
        }
    }

    getDistrictIndex() {
        return this.districtsQueue.findIndex(e => e === window.location.href.replace(/#$/g, '').match(/[a-z_]+$/g)[0]);
    }

    step2Share() {
        let userData = JSON.parse(localStorage.userData || '[]');
        this.choice.userImg = [];
        this.choice.userName = [];

        userData.forEach(e => {
            this.choice.userImg.push(e.img)
            this.choice.userName.push(e.name)
        })

        this.shareChoices();
    }

    chooseCandidate(element) {
        let index = this.districtsQueue.findIndex(e => e === this.currentDistrict),
            choiceArr = JSON.parse(localStorage.choiceData || '[]'),
            currentChoice = JSON.parse(localStorage.currentChoice || '[]'),
            userData = JSON.parse(localStorage.userData || '[]'),
            existCount = +localStorage.existCount,
            candidate = this.candidatesInfo[+element.dataset.index].querySelector('.candidate_img');

        if(this.toNext) {
            if(choiceArr[index] === (+element.dataset.index - 1)) {
                currentChoice[index] = null;
                userData[index] = null;
            } else {
                currentChoice[index] = {
                    img: candidate.children[0] && candidate.children[0].src,
                    name: candidate.closest('th') && candidate.closest('th').children[0].innerText
                };
                userData[index] = {
                    img: candidate.children[0] && candidate.children[0].src,
                    name: candidate.closest('th') && candidate.closest('th').children[0].innerText
                };
            }
            this.setActiveAttributes(element, choiceArr[index] !== +element.dataset.index - 1);
            if(choiceArr[index] === (+element.dataset.index - 1)) {
                choiceArr[index] = null;
            } else {
                choiceArr[index] = +element.dataset.index - 1;
            }
            localStorage.currentChoice = JSON.stringify(currentChoice);
            localStorage.choiceData = JSON.stringify(choiceArr);
            localStorage.userData = JSON.stringify(userData);
            if(JSON.parse(localStorage.currentChoice).filter(e => e).length === existCount) {
                this.openSummaryModal();
            }
        }
    }

    setActiveAttributes(element, activeDeactive) {
        let selected = document.querySelectorAll('.candidate_img.highlight'),
            selectedBtn = document.querySelectorAll('.choose_candidate.active'),
            candidate = this.candidatesInfo[+element.dataset.index].querySelector('.candidate_img'),
            mobileCandidate = this.candidatesInfoMobile[+element.dataset.index].querySelector('.candidate_img'),
            elements = document.querySelectorAll(`div[data-index="${element.dataset.index}"]`);

        this.removeSelected(selected[0], 'highlight');
        this.removeSelected(selected[1], 'highlight');
        this.removeSelected(selectedBtn[0], 'active');
        this.removeSelected(selectedBtn[1], 'active');

        if(activeDeactive && elements.length) {
            elements[0].classList.add('active');
            elements[0].children[0].innerText = element.classList.contains('desktop_choose') ? 'Chosen' : 'Chosen Candidate';
            elements[1].classList.add('active');
            elements[1].children[0].innerText = element.classList.contains('desktop_choose') ? 'Chosen' : 'Chosen Candidate';
            candidate.classList.add('highlight');
            candidate.appendChild(this.createIcon());
            mobileCandidate.classList.add('highlight');
            mobileCandidate.appendChild(this.createIcon());
        }
    }

    async toNextDistrict(district = '') {
        let data,
            index = this.districtsQueue.findIndex(e => e === this.currentDistrict),
            element = document.querySelector(`.choose_candidate[data-index="${index}"]`),
            existCount = +localStorage.existCount,
            status = JSON.parse(localStorage.currentChoice).filter(e => e).length === existCount,
            election;

        this.toNext = false;
        index = index + 1 === this.districtsQueue.length ? 0 : index + 1;
        this.currentDistrict = this.districtsQueue[index];

        data = await this.httpGet(`${this.baseUrl}step2/${this.currentDistrict}?html=true`);
        this.toNext = true;
        election = data.election;
        data = this.createStep2Html(data.data);
        if(data.querySelectorAll('th').length === 1 || !election) {
            this.toNextDistrict()
        } else {
            if(status) {
                this.openSummaryModal();
            }
            document.querySelector('.mobile_desktop_container') && document.querySelector('.mobile_desktop_container').remove();
            document.body.appendChild(data);
            this.setCandidateInfo();
            this.setStep2Choices(index);
        }
    }

    openSummaryModal() {
        let userImg = Object.values(document.querySelectorAll('.district-user-img')),
            userName = Object.values(document.querySelectorAll('.district-user-name')),
            icons = Object.values(document.querySelectorAll('.district-icon-img')),
            currentChoice = JSON.parse(localStorage.currentChoice),
            user;

        userImg.forEach((e, i) => {
            if(currentChoice[i]) {
                icons[i].style.display = 'inline';
                e.style.display = 'inline';
                e.src = currentChoice[i].img;
                userName[i].innerText = currentChoice[i].name.replace(/\n/, ' ');
            } else {
                icons[i].style.display = 'none';
                e.style.border = 'none';
                userName[i].innerText = '';
            }
        })

        document.getElementById('summaryModal').style.display = 'flex';
        localStorage.currentChoice = '[]';
    }

    setStep2Choices(index) {
        let choiceArr = JSON.parse(localStorage.choiceData || '[]'),
            i = choiceArr[index] !== null ? +choiceArr[index] : undefined,
            element = document.querySelectorAll(`div[data-index="${i + 1}"]`);

        if(element[0]) {
            this.setActiveAttributes(element[0], true)
        }
    }

    createStep2Html(data) {
        return new DOMParser().parseFromString(data, 'text/html').querySelector('.mobile_desktop_container');
    }

    chooseStep2Candidate(element) {
        let icon = this.createIcon(),
            selected = document.querySelector(`.select_candidate.higlight[data-id="${element.dataset.id}"]`),
            userImg = this.choice.userImg || [],
            userName = this.choice.userName || [];

        this.removeSelected(selected, 'higlight');
        //remove
        userImg[element.dataset.id] = new Image().src = element.children[0].src.replace('https://texas2020.org/', 'https://soheard.dev/dev/texas2020-full/');
        // userImg[element.dataset.id] = new Image().src = element.children[0].src;
        userName[element.dataset.id] = element.previousElementSibling &&  element.previousElementSibling.innerText;
        this.choice = {
            ...this.choice,
            userImg,
            userName
        }

        element.classList.add('higlight'),
        element.appendChild(icon);
        this.setChoiceData(element);
    }
    
    setChoiceData(element) {
        let data = JSON.parse(localStorage.choiceData || '[]');

        data[element.dataset.id] = element.parentElement.dataset.id;
        localStorage.setItem('choiceData', JSON.stringify(data));
    }

    getEVoteElement(element, type) {
        return type === 'mobile' ?
            document.querySelector('.step2_mobile').querySelectorAll('tr>td:nth-child(1)')[+element.dataset.id * 2 + 1] :
            document.querySelector('.step2_desktop').querySelectorAll('tr>td:nth-child(2)')[element.dataset.id];
    }
    
    async stepThreeVote(element) {
        const images = {
            agree: `${this.baseUrl}assets/images/green-up.png`,
            disagree: `${this.baseUrl}assets/images/red-down.png`,
            neither: 'N/A'
        }, answer = element.className.includes('step3-agree') ? 'agree' : element.className.includes('step3-disagree') ? 'disagree' : 'neither',
        dParent = element.closest("td") || this.getEVoteElement(element, 'desktop'),
        mParent = element.closest("td") || this.getEVoteElement(element, 'mobile'),
        question = element.parentNode.dataset.name ? element.parentNode.dataset.name.replace(/_answer$/g, '') : element.dataset.name.replace(/_answer$/g, ''),
        increments = this.candidatesInfo[0].querySelectorAll('li>p');
        let el, div;

        switch(answer) {
            case 'agree':
                increments[0].innerText = increments[0].innerText.trim() == '-' ? 1 : +increments[0].innerText + 1;
            break;
            case 'disagree':
                increments[1].innerText = increments[1].innerText.trim() == '-' ? 1 : +increments[1].innerText + 1;
            break;
            case 'neither':
                increments[2].innerText = increments[2].innerText.trim() == '-' ? 1 : +increments[2].innerText + 1;
            break;
        }

        if(answer === 'neither') {
            el = document.createElement('p')
            el.innerText = images[answer];
        } else {
            el = document.createElement('img');
            el.src = images[answer]
        }
        console.log(element)
        await this.post({question, answer}, 'Home/userVote');
        dParent.replaceChild(el, dParent.children[1]);
        mParent.replaceChild(el.cloneNode(true), mParent.children[1]);
        document.getElementById('infoModal').style.display = 'none';
    }
    
    createEmptyContainer() {
        return new DOMParser()
            .parseFromString('<div class="mobileCommingSoon"><p>Coming Soon!</p></div>', 'text/html')
            .querySelector('div')
    }
    
    playVideo(element) {
        $.get('/issues/video-link/'+(element.dataset.id+1), function(data) {
            let iframe = document.createElement('iframe'),
            container = document.getElementById('vModalContainer'),
            noVideo;
            
            let url = data.link.replace('www.youtube.com/watch?v=','www.youtube.com/embed/').replace('youtu.be/', 'www.youtube.com/embed/')+'?autoplay=1';

            if(url.trim()) {
                iframe.width="100%";
                iframe.height="100%";
                iframe.src = url;
                iframe.allow = 'true';
                iframe.classList.add('videoIframe');    
            } else {
                noVideo = this.createEmptyContainer();
            }

            container.querySelector('iframe') && container.querySelector('iframe').remove();
            container.querySelector('.mobileCommingSoon') && container.querySelector('.mobileCommingSoon').remove()
            noVideo ? container.appendChild(noVideo) : container.appendChild(iframe);
            container.parentElement.style.display = 'flex';
        })
    }
    
    closeVideoModal() {
        let modal = document.getElementById('vModalContainer');

        modal.querySelector('iframe') && modal.querySelector('iframe').remove();
        modal.parentElement.style.display = 'none';
    }
    
    closeSummaryModal() {
        let modal = document.getElementById('summaryModal');

        modal.style.display = 'none';
    }
    
    async shareToFacebook(index) {
        FB.ui({
            method: 'share',
            href: this.baseUrl + "/choice/index/" + index
        }, function( response ) {
            console.log(response)
        });
    }
    
    removeChooses() {
        localStorage.choiceData = '[]';
        localStorage.currentChoice = '[]';
        localStorage.userData = '[]';
    }
    
    async shareChoices() {
        let status = this.choice.userImg && this.choice.userImg.filter((e, i) => e && this.choice.userName[i]).length >= localStorage.existCount, img, data;

        if(status) {
            try {
                this.toImg = new CreateImg(this.choice);
                img = await this.toImg.createImage();
                data = await this.post({'base64': img}, 'save-choice-img');
                data = JSON.parse(data);
                document.getElementById('choiceIndex').dataset.id = data.indexName;
                await this.shareToFacebook(data.indexName);
            } catch(e) {
                console.log(e)
            }
        }
    }

    openInfoModal(element) {
        let container = document.getElementById('infoModal');

        container.querySelector('.problem').innerText = this.infoModalData[element.dataset.infoId].problem;
        container.querySelector('.solution').innerHTML = this.infoModalData[element.dataset.infoId].solution;
        container.querySelector('.problem-solution-img').src = this.infoModalData[element.dataset.infoId].img;

        container.querySelector('.desktopAgree').dataset.id = element.dataset.infoId;
        container.querySelector('.desktopDisagree').dataset.id = element.dataset.infoId;
        container.querySelector('.desktopSkip').dataset.id = element.dataset.infoId;

        container.querySelector('.desktopAgree').dataset.name = this.infoModalData[element.dataset.infoId].name;
        container.querySelector('.desktopDisagree').dataset.name = this.infoModalData[element.dataset.infoId].name;
        container.querySelector('.desktopSkip').dataset.name = this.infoModalData[element.dataset.infoId].name;

        container.style.display = 'flex';
    }

    closeInfoModal(element, target) {
        target.style.display = target.id === 'infoModal' ? 'none' : 'flex';
    }

    resetChoices(element) {
        let selected = Object.values(document.querySelectorAll('.select_candidate.higlight'));

        selected.forEach(e => {
            e.classList.remove('higlight');
            e.querySelector('.tick') && e.querySelector('.tick').remove();
        })

        localStorage.choiceData = '[]';
        localStorage.userData = '[]';
        localStorage.currentChoice = '[]';
        this.step1Init();
    }
    
    bindEvents() {
        const clickEvents = {
            goToStep3: {
                element: 'compare_btn'
            },
            openCandidateModal: {
                element: 'openCandidateModal'
            },
            toStep2: {
                element: 'backToDistricts'
            },
            toTexas2020: {
                element: 'backToTexas2020'
            },
            chooseCandidate: {
                element: 'choose_candidate'
            },
            stepThreeVote: {
                element: 'step3-agree, step3-disagree, step3-skip'
            },
            playVideo: {
                element: 'play-video'
            },
            closeVideoModal: {
                element: 'closeVideoModal'
            },
            shareChoices: {
                element: 'shareChoices'
            },
            closeSummaryModal: {
                element: 'close-summary-modal'
            },
            toNextDistrict: {
                element: 'toNextOffice'
            },
            step2Share: {
                element: 'share_comparision'
            },
            removeChooses: {
                element: 'remove_chooses'
            },
            openInfoModal: {
                element: 'openInfoModal'
            },
            closeInfoModal: {
                element: 'info-modal-container'
            },
            resetChoices: {
                element: 'reset_choices'
            }
        };
        let status;

        document.addEventListener('click', (e) => {
            for(let func in clickEvents) {
                status = false;
                status = clickEvents[func].element.split(',').filter(i => e.target.classList.contains(i.trim())).length ||
                         clickEvents[func].element.split(',').filter(i => e.target.parentElement.classList.contains(i.trim())).length

                if(+status) {
                    this[func].call(this, clickEvents[func].element.split(',').filter(i => e.target.classList.contains(i.trim())).length ? e.target : e.target.parentElement, e.target);
                }
            }
        })
    }
}

window.onload = () => {
    const script = new Script();
}
