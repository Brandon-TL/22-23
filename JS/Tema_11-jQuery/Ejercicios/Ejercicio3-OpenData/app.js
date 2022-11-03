let ajax = new XMLHttpRequest();

let song = {};
let songs = [];

$(document).ready(function () {
    $.ajax({
      type: "GET",
      url: "https://raw.githubusercontent.com/Brandon-TL/Shamaz-s---Open-Data/main/Shazams.xml",
      dataType: "xml",
      success: showCountries
    });
});

function showCountries(shazams) {
    let saved = [];
    $(shazams).find('song').each(function () {
        song = {
            _tier : $(this).find('tier').text(),
            _country : $(this).find('country').text(),
            _author : $(this).find('author').text(),
            _name : $(this).find('name').text()
        }
        songs.push(song);
    });

    $(shazams).find('country').each(function () {
        if (!saved.includes($(this).text())) {
            saved.push($(this).text());
            saved.sort();
        }  
    });
    
    for (let i = 0; i < saved.length; i++) {
        $("#selector").append(
            $('<option>').attr(
                "value", saved[i]
            ).append(saved[i])
        );
        console.log(saved[i]);
    }
}

$('#selector').on('change', function () {
    $('#visor table').html('');
    $('#visor').css({
        'display' : 'block'
    });
    $('#visor table').append(
        $('<th>').append('TIER'),
        $('<th>').append('ARTIST'),
        $('<th>').append('NAME'),
        $('<th>').append('LINK')
    );
    songs.forEach(function (e) {
        let tr = $('<tr>');
        if ($('#selector option:selected').val() == e._country) {
            tr.append(
                $('<td>').append(e._tier),
                $('<td>').append(e._name),
                $('<td>').append(e._author),
                $('<td>').append(
                    $('<a>', {
                        'href' : `https://www.youtube.com/results?search_query=${e._name}`,
                        'target' : '_blank'
                    }).append(
                        $('<img>', {
                            'src' : 'http://assets.stickpng.com/images/580b57fcd9996e24bc43c545.png',
                            'alt' : 'YouTube Link'
                        }).css({
                            'height' : '20px'
                        })
                    )
                )
            ).appendTo('#visor table');
        }
    });
});