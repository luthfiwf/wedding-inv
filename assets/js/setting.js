const color = [{
        name: 'pink',
        code: '#fb839e',
        url: 'assets/css/skins/pink.css'
    },
    {
        name: 'light blue',
        code: '#3e99f4',
        url: 'assets/css/skins/light-blue.css'
    },
    {
        name: 'light green',
        code: '#0dcebd',
        url: 'assets/css/skins/light-green.css'
    },
    {
        name: 'red',
        code: '#cc3a3b',
        url: 'assets/css/skins/red.css'
    },
    {
        name: 'yellow',
        code: '#ff9801',
        url: 'assets/css/skins/yellow.css'
    }
]

$(document).ready(function() {
    setColors();

    function setColors() {
        for (let i = 0; i < color.length; i++) {
            const span = document.createElement("span");
            span.style.backgroundColor = color[i].code;
            $(".colors").append(span);

        }
    }
    $(".colors span").click(function() {
        const index = $(this).index();
        $(".alternate-style").attr("href", color[index].url);
    })

    // theme mode
    $(".theme-mode").change(function() {
        if ($(this).val() == "light") {
            $("body").removeClass("dark")
        } else {
            $("body").addClass("dark")
        }
    })

    // hide setting box
    $(".s-toogle-btn").click(function() {
        $(".setting").toggleClass("open");
    })
})