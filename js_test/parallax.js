const firstPage = document.querySelector('.firstpage');
const secondpage = document.querySelector('.secondpage');
const thirdpage = document.querySelector('.thirdpage');
const mainTitle = document.querySelector('.firstpage h1');
const background = document.querySelector('.background');
const foreground = document.querySelector('.foreground');
const middleground = document.querySelector('.middleground');
const spans = document.querySelectorAll('.secondpage h1 span');
const secondPageHeading = secondpage.querySelector('h1.heading');
const logo =  secondpage.querySelector('img');

const FIRST_PAGE_MAX_SCROLL = 500;
const FIRST_TRANS_MIN = 400;
const FIRST_TRANS_MAX = 600;
const MAXIMUM_LENGTH_HEADING_OPACITY = 250
const SECOND_PAGE_TRANS_MAX = 3100;
const SECOND_PAGE_BAR = 1100;
const THIRD_PAGE_START = 1800;

document.addEventListener("scroll",event=>{
    let scrollOffset = window.pageYOffset;
    //console.log(scrollOffset);
    if (scrollOffset <= FIRST_PAGE_MAX_SCROLL) {
        firstPage.hidden = false;
        firstPage.style.opacity = 1;

        let p = scrollOffset / FIRST_PAGE_MAX_SCROLL;
        mainTitle.style.transform = `scale(${1 + (0.1 + p)})`;
        background.style.transform = `scale(${1 + (0.6 * p)})`;
        foreground.style.transform = `scale(${1 + (p)})`;
        middleground.style.transform = `scale(${1 + (0.4 * p)})`;
    }

    if (scrollOffset >= FIRST_TRANS_MIN && scrollOffset <= FIRST_TRANS_MAX) {
        let op = (1 - (scrollOffset / FIRST_PAGE_MAX_SCROLL)) * 10;
        if (op <= 0) {
            firstPage.hidden = true;
        }else {
            firstPage.style.opacity = op;
        }
    }

    if (scrollOffset > FIRST_TRANS_MAX) {
        let yOffset = scrollOffset - FIRST_TRANS_MAX;
        spans[0].style.transform = `translate3d(0px,${-yOffset}px,0px)`
        spans[2].style.transform = `translate3d(0px,${yOffset}px,0px)`

        if (yOffset >= MAXIMUM_LENGTH_HEADING_OPACITY) {
            let hOpacity = MAXIMUM_LENGTH_HEADING_OPACITY / yOffset;
            secondPageHeading.style.opacity = hOpacity > 0.3 ? hOpacity : 0;
            let logoScale = yOffset / (MAXIMUM_LENGTH_HEADING_OPACITY * 10);

            logo.style.transform = `scale(${logoScale})`;
        }

    }
   // console.log("scrollOffset ===> ",scrollOffset)
    if (scrollOffset > THIRD_PAGE_START) {
        let secondPageMove = scrollOffset - THIRD_PAGE_START;
        let thirdPagePosition = secondPageMove + 920;
        secondpage.style.transform = `translate3d(0px,${-secondPageMove}px,0px)`;
        thirdpage.style.transform = `translateY(${thirdPagePosition}px)`;
    }



});