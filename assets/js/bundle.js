$("#shortlink").height($(window).height() - parseFloat($("header").css("padding-top").replace('px', '')));
if ($(window).width() > 425)
    $("#plan").height($(window).height());


//link site//
if (window.location.href.includes("/shortlink/links.php")) {

    const perpage = 15;
    let data = 0, start = 0;
    let pagenumber = $("#links>div>div");
    let max;
    $.ajax({
        type: "GET",
        url: "./getlinks.php",
        success: (links) => {
            data = links;
            max = Object.keys(data).length;
            renderlinks();
        },
        error: () => { alert("error when loading data") }
    })

    function cleartable() {
        for (let i = 1; i < perpage; i++) {
            $("tr").last().remove();
        }

    }
    function renderlinks() {
        let link;
        for (let i = 0; i < perpage; i++) {
            link = data[start + i];
            $("table").append("<tr><td>" + link.long_url + "</td><td>" + link.short_url + "</td><td>" + link.created_at + "</td><td>" + link.visits + "</td></tr>");
        }
        $("#links>div>div").html(start)
    }
    $("#before").on("click", () => {
        if (start == 0)
            return;
        else {
            cleartable();
            start = start - perpage;
            renderlinks();
        }
    })

    $("#next").on("click", () => {
        if (start + perpage > max) {
            return;
        }
        else {
            start = start + perpage;
            cleartable();
            renderlinks();
        }
    })
}

//header nav // 
let deg = 0;
let move, start, end;
start = -500;
$("#user,#nav > img").on("click", () => {
    if (deg == 0) {
        clearInterval(move);
        deg = 180;
        end = 0;
        $("#user").addClass("active");
        move = setInterval(() => {
            if (start >= end) {
                clearInterval(move);
            }
            else {
                start = start + 20;
                $("#nav>ul").css("right", start + "px");
            }
            console.log("move in" + start);
        }, 10);
    } else {
        clearInterval(move);
        deg = 0;
        end = -1000;
        $("#user").removeClass("active");
        move = setInterval(() => {
            if (start <= end) {
                clearInterval(move);
            }
            else {
                start = start - 20;
                $("#nav>ul").css("right", start + "px");
            }
        }, 10);
    }
    $("#nav > img").css("transform", "rotate(" + deg + "deg)");

})
//header nav // 
function isValidHttpUrl(string) {
    let url;
    try {
        url = new URL(string);
    } catch (_) {
        return false;
    }

    return url.protocol === "http:" || url.protocol === "https:";
}


const shortlink_btn = $("#shortlink > form > img");
const shortlink_input = $("#shortlink > form > input");
const shortlink_reload = $("#shortlink > div");

shortlink_input.on("change keyup paste click input", function () {
    if (shortlink_input.attr("value") == "URL") {
        let width = 4;
        let max = $(window).width() > 425 ? 24 : 16;

        shortlink_input.attr("value", "");
        shortlink_input.css("height", "3rem");
        let id = setInterval(() => {
            if (width > max) {
                clearInterval(id);
            } else {
                width = width + width * 0.1;
                shortlink_input.css("width", width + 'rem');
            }
        }, 10);
        shortlink_input.css("padding-right", "3.5rem");
        shortlink_btn.css("display", "block");
    }
})


shortlink_btn.on("click", () => {
    if (shortlink_btn.attr("action") == "check") {
        if (!isValidHttpUrl($("#url").val())) {
            alert("enter wrong url!")
            return;
        }
        let link = encodeURIComponent($("#url").val());
        $.ajax({
            type: "POST",
            url: "geturl.php",
            data: { url: link },
            success: function (shortlink) {
                shortlink_input.val(shortlink.shortlink);
                shortlink_btn.attr("src", shortlink_btn.attr("src").replace("check", "copy"));
                shortlink_btn.attr("action", "copy");
                shortlink_reload.css("display", "flex");
            },
            error: function () {
                console.log("there are error when make a request")
            }
        })
    } else if (shortlink_btn.attr("action") == "copy") {
        console.log("aa");
        shortlink_input.select();
        document.execCommand("copy");

    }
})

shortlink_reload.on("click", () => {
    shortlink_input.val("");
    shortlink_btn.attr("src", shortlink_btn.attr("src").replace("copy", "check"));
    shortlink_btn.attr("action", "check");

})
//plan//
let startWidth = 14;
let endWidth;
let ison = false;
$(".plan-item").each((item) => {
    $(".plan-item").eq(item).click(() => {
        if (ison) return;

        endWidth = $(window).width() / 10 * 7 / 16;
        if ($(window).width() <= 425) {
            $(".plan-item>div:nth-child(1)").css("display", "none");
            endWidth = $(window).width() / 16;
        }

        $(".plan-item").hide();
        $(".plan-item").eq(item).show();
        $(".plan-item").css("justify-content", "space-between");
        $(".plan-item").addClass("active-dark");
        $(".plan-item>div:nth-child(2)").css("display", "flex");

        let anim = setInterval(() => {
            startWidth = startWidth + 0.5;
            $(".plan-item").eq(item).css("width", startWidth + "rem");
            if (startWidth >= endWidth) {
                clearInterval(anim);
                ison = true;
            }
        }, 2)
    })

    $(".plan-item>div:nth-child(2) > img").on("click", () => {
        endWidth = 14;
        let anim = setInterval(() => {
            startWidth = startWidth - 0.5;
            $(".plan-item").eq(item).css("width", startWidth + "rem");
            if (startWidth <= endWidth) {
                clearInterval(anim);
                $(".plan-item").show();
                $(".plan-item").removeClass("active-dark");
                $(".plan-item> div:nth-child(2)").hide();
                if ($(window).width() <= 425) $(".plan-item>div:nth-child(1)").css("display", "flex");
                $(".plan-item").css("justify-content", "center");
                ison = false;
            }
        }, 10)
    })
});
