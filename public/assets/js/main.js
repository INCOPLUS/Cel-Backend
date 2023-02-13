// sidebar
var open = document.querySelector('.icone-open');
var sidebar = document.querySelector('.menu');
var cover = document.querySelector('.overlay')

if(open){
    open.addEventListener('click', function(e){
        e.stopPropagation();
        sidebar.classList.add('active')
        cover.classList.add('active')
    })

    window.addEventListener('click', function(){
        sidebar.classList.remove('active')
        cover.classList.remove('active')
    })
}

// ******* lang ***/
function changeLanguage(smallImg){
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
}

function addIcon(icon){
    var span = icon.previousElementSibling;
    var img = span.querySelector('img');
    var fullImg = document.getElementById("imageBox");
    fullImg.src = img.src;
}

// partage
var partage = document.querySelectorAll('.btn-partage');

partage.forEach(dot => {
    dot.addEventListener('click', function(e) {
        e.stopPropagation();
        dot.childNodes[3].classList.toggle('active');

        partage.forEach(singleMenu => {
            if(singleMenu != dot) {
                singleMenu.childNodes[3].classList.remove('active')
            }
        })
    })

    window.addEventListener('click', function() {
        // dot.childNodes[3].classList.remove('active');
    })
})

// utilisteur
var open = document.querySelector('.box-user');
var content = document.querySelector('.user-link');

if(open){
    open.addEventListener('click', function(e){
        e.stopPropagation();
        content.classList.toggle('active')
    })
    
    window.addEventListener('click', function(){
        content.classList.remove('active')
    })
}


// faire afficher le button return top
var btnTop = document.getElementById('btnReturn')

if(btnTop){
    btnTop.onclick = function () {
        window.scrollTo(pageXOffset, 0);
    };
    
    window.addEventListener('scroll', function () {
        btnTop.hidden = (pageYOffset < document.documentElement.clientHeight);
    });
}


// owl carousel header
$('#owl-carousel-header').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    animateOut: 'fadeOut',
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    smartSpeed: 2000,
    items: 1,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// owl carousel partners
$('#owl-carousel-partners').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout: 5000,
    autoplayHoverPause:true,
    smartSpeed: 2000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

// owl carousel partners
$('#owl-carousel-testimoniale').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: true,
    autoplay:true,
    autoplayTimeout: 6000,
    smartSpeed: 2000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})

// text animate
var TxtRotate = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10000) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
    };

    TxtRotate.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
    };

    window.onload = function() {
    var elements = document.getElementsByClassName('txt-rotate');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-rotate');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
};

/* methode jquery pour ajouter la class au scroll*/    
/*changement de comportement navbar*/

$(window).on('scroll',function(){
    if($(window).scrollTop()){
      $('.navigation').addClass('navChange');
    }
    else{
      $('.navigation').removeClass('navChange');  
    }
});


/* loader */
let time = setInterval(() => {
    if (document.readyState == "complete") {
        $(".preloader").hide();
        clearInterval;
    }
}, 3000)

// change language
var language = document.querySelector('.language');
var boxLang = document.querySelector('.box-lang');

if(language){
    language.addEventListener('click', function(e){
        e.stopPropagation();
        boxLang.classList.toggle('active')
    })
    
    window.addEventListener('click', function(){
        boxLang.classList.remove('active')
    })
}

// change filtre
var btnFiltre = document.querySelector('.btn-filtre');
var filtre = document.querySelector('.info-education');

if(btnFiltre){
    btnFiltre.addEventListener('click', function(e){
        e.stopPropagation();
        filtre.classList.toggle('active')
    })
    
    window.addEventListener('click', function(){
        filtre.classList.remove('active')
    })
}


//************************* script js dashboard
// toggle sidebar
let sideBar = document.querySelector('.sidebar');
let iconOpen = document.querySelector('.iconOpen');
let iconClose = document.querySelector('.iconClose');

function toggleSidebar(){
    sideBar.classList.toggle('active');
    
    if(sideBar.classList.contains('active')){
        iconOpen.setAttribute('class', 'hidden')
        iconClose.setAttribute('class', 'visible')
    } else {
        iconOpen.setAttribute('class', 'visible')
        iconClose.setAttribute('class', 'hidden')
    }
}

// ******* langue ***/
var imageBox = document.querySelector('#imageBox');
var boxLang = document.querySelector('.box-lang');

if(imageBox){
    imageBox.addEventListener('click', function(e){
        e.stopPropagation();
        boxLang.classList.toggle('active')
    })
    
    window.addEventListener('click', function(){
        boxLang.classList.remove('active')
    })
}

function changeLanguage(smallImg){
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
}

function addIcon(icon){
    var span = icon.previousElementSibling;
    var img = span.querySelector('img');
    var fullImg = document.getElementById("imageBox");
    fullImg.src = img.src;
}

// delete message
var deleteMsg = document.querySelectorAll('.btn-delete');

deleteMsg.forEach(dot => {
    dot.addEventListener('click', function(e) {
        e.stopPropagation();
        dot.nextElementSibling.classList.toggle('active');

        deleteMsg.forEach(singleMenu => {
            if(singleMenu != dot) {
                singleMenu.nextElementSibling.classList.remove('active')
            }
        })
    })

    window.addEventListener('click', function() {
        dot.nextElementSibling.classList.remove('active');
    })
})

// partage
var partage = document.querySelectorAll('.btn-partage');

partage.forEach(dot => {
    dot.addEventListener('click', function(e) {
        e.stopPropagation();
        dot.nextElementSibling.classList.toggle('active');

        partage.forEach(singleMenu => {
            if(singleMenu != dot) {
                singleMenu.nextElementSibling.classList.remove('active')
            }
        })
    })

    window.addEventListener('click', function() {
        dot.nextElementSibling.classList.remove('active');
    })
})

// list chat
var openList = document.querySelector('.icon-comment');
var closeList = document.querySelector('.icon-close');
var contentList = document.querySelector('#box-user-list');

if(openList){
    openList.addEventListener('click', function(e){
        e.stopPropagation();
        contentList.classList.toggle('active')
    })
    
    closeList.addEventListener('click', function(e){
        contentList.classList.remove('active')
    })
}

// action btn table
var action = document.querySelectorAll('.btn-action');

action.forEach(dot => {
    dot.addEventListener('click', function(e) {
        e.stopPropagation();
        dot.nextElementSibling.classList.toggle('active');

        action.forEach(singleMenu => {
            if(singleMenu != dot) {
                singleMenu.nextElementSibling.classList.remove('active')
            }
        })
    })

    window.addEventListener('click', function() {
        dot.nextElementSibling.classList.remove('active');
    })
})

// add champ form modif
var btnAdd = document.querySelectorAll('.btn-add');

btnAdd.forEach(dot => {
    dot.addEventListener('click', function(e) {
        e.stopPropagation();
        dot.childNodes[3].classList.toggle('active');

        btnAdd.forEach(singleMenu => {
            if(singleMenu != dot) {
                singleMenu.childNodes[3].classList.remove('active')
            }
        })
    })

    window.addEventListener('click', function() {
        dot.childNodes[3].classList.remove('active');
    })
})

// progress form
$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(++current);
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    
    $(".submit").click(function(){
    return false;
    })
    
});