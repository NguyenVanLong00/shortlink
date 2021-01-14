
// $("#background").css("width", window.innerWidth / 2 + 'px');
// $("#background").css("height", window.innerHeight + 'px');


$(document).ready(function () {
    let anim1;
    let deg1 = 180;
    let anim2;
    let deg2 = 180;
    let arrow=90;

    $('#login-fb-gg').mouseenter(() => {
        clearInterval(anim1)
        anim1 = setInterval(() => {
            $('svg')[0].style.transform = "rotate3d(1,0,0," + deg1 + "deg)";
            deg1 = deg1 - 1;
            if (deg1 < 2) clearInterval(anim1);
        }, 10);
        
    })
    $('#login-fb-gg').mouseleave(() => {
        clearInterval(anim1)
        anim1 = setInterval(() => {
            $('svg')[0].style.transform = "rotate3d(1,0,0," + deg1 + "deg)";
            deg1 = deg1 + 1;
            if (deg1 > 179) clearInterval(anim1);
        }, 10);
    })
    $('#login-acc').mouseenter(() => {
        clearInterval(anim2)
        anim2 = setInterval(() => {
            $('svg')[1].style.transform = "rotate3d(1,0,0," + deg2 + "deg)";
            deg2 = deg2 - 1;
            if (deg2 < 2) clearInterval(anim2);
        }, 10);
    })
    $('#login-acc').mouseleave(() => {
        clearInterval(anim2)
        anim2 = setInterval(() => {
            $('svg')[1].style.transform = "rotate3d(1,0,0," + deg2 + "deg)";
            deg2 = deg2 + 1;
            if (deg2 > 179) clearInterval(anim2);
        }, 10);
    })
    
    $('img').click(()=>{
        $('img').css("transform","rotate("+arrow+"deg)");
        arrow=arrow+180;
        if((arrow/90)%2==0){
            window.location.hash = "login-acc";
        }else{
            window.location.hash = "login-fb-gg"
        }
    });
});


