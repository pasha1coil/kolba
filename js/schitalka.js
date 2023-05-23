function show_popap(id_popap) {
    var id = "#" + id_popap;
    $(id).addClass('active');
    }
    function close_popap(id_popap) {
    var id = "#" + id_popap;
    $(".overlay").removeClass("active");
    }


    window.addEventListener("DOMContentLoaded", function() {
var nodes = document.querySelectorAll(".parent");
[].forEach.call(nodes, function(tr) {
    var box = [],
        next = tr.nextElementSibling;
    while (next && next.classList.contains("box")) {
        box.push(next);
        next = next.nextElementSibling
    }
    tr.cells[0].addEventListener("click", function() {
        box.forEach(function(item) {
            item.classList.toggle("show")
        });
        return false
    })
})
});

function mult(second,first,result) {
    second.value = second
    var first = document.getElementById(first).value;
    document.getElementById(result).innerHTML = first * second;
}

function sumballAll() {
    var res ='result';
    let i = 1
    var names= [];
    while (i < 80) {
    name = res+i;
    var chislo = document.getElementById(name).textContent;
    names.push(chislo); 
      i++;
}	
    var sum = 0
    for(var j = 0; j < names.length; j++){
    names[j]=Number(names[j])
    sum += names[j];
    }
    document.getElementById("result").innerText = sum;
}

function filter (phrase, _id){
    var words = phrase.value.toLowerCase().split(" ");
    var table = document.getElementById(_id);
    var ele;
    for (var r = 1; r < table.rows.length; r++){
        ele = table.rows[r].innerHTML.replace(/<[^>]+>/g,"");
            var displayStyle = 'none';
            for (var i = 0; i < words.length; i++) {
            if (ele.toLowerCase().indexOf(words[i])>=0)
            displayStyle = '';
            else {
            displayStyle = 'none';
            break;
            }
            }
        table.rows[r].style.display = displayStyle;
    }
}


$(function() {

    $('.js-check-all').on('click', function() {
  
        if ( $(this).prop('checked') ) {
            $('th input[type="checkbox"]').each(function() {
                $(this).prop('checked', true);
          $(this).closest('tr').addClass('active');
            })
        } else {
            $('th input[type="checkbox"]').each(function() {
                $(this).prop('checked', false);
          $(this).closest('tr').removeClass('active');
            })
        }
  
    });
  
    $('td[scope="row"] input[type="checkbox"]').on('click', function() {
      if ( $(this).closest('tr').hasClass('active') ) {
        $(this).closest('tr').removeClass('active');
      } else {
        $(this).closest('tr').addClass('active');
      }
    });
  
      
  
  });



  


  