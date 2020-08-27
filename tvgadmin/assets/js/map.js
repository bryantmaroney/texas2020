$(document).ready(function($) {

    drawMapRequest("candidates")

});

function drawMapRequest(section) {
    $.ajax({
        url: site_url + 'get/map/data',
        type: 'POST',
        dataType: 'json',
        data: {section: section},
        success:function(response) {
          drawMap(response)
          // console.log(response)
        }
    })
}

function drawMap(plots) {

    $world = $(".world");
    $world.mapael({
        map: {
            name: "usa_states",
            defaultArea: {
                attrs: {
                    fill: "#3381E5",
                    stroke: "white"
                },
                attrsHover: {
                    fill: "#2E73CD",
                }

            },
            defaultPlot: {
                size: 30,
                text: {
                    attrs: {
                        fill: "red",
                        "font-weight": "normal"
                    },
                    attrsHover: {
                        fill: "red",
                        "font-weight": "bold"
                    }
                },
                attrs: {
                    fill: "red",
                    "stroke-width": 1
                },
                attrsHover: {
                    transform: "s1.5",
                    "stroke-width": 1
                },

            }
        },
        legend: {
            plot: {
                display: true,
                title: "City population",
                marginBottom: 6,
                
            }
        },
        plots: $.extend(true, {}, plots),
    });
}





