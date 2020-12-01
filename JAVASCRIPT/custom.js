const input = document.querySelector(".finder__input");
const finder = document.querySelector(".finder");
const form = document.querySelector("form");

input.addEventListener("focus", () => {
  finder.classList.add("active");
});

input.addEventListener("blur", () => {
  if (input.value.length === 0) {
    finder.classList.remove("active");
  }
});

form.addEventListener("submit", (ev) => {
  ev.preventDefault();
  finder.classList.add("processing");
  finder.classList.remove("active");
  input.disabled = true;
  setTimeout(() => {
    finder.classList.remove("processing");
    input.disabled = false;
    if (input.value.length > 0) {
      finder.classList.add("active");
    }
  }, 1000);
});


  let $qty_up = $(".qty .qty-up");
  let $qty_down = $(".qty .qty-down");
  let $input= $(".qty .qty-input");

  $qty_up.click(function(e){
    if($input.val()>=1 && $input.val()<=10){
      $input.val(function(i,oldval){
        return ++oldval;
      })
    }
  })


  $("#blogs .owl-carousel").owlcarousel({
    
  });

  $(document).ready(function(){
    alert("Ok i was here atleast");
    $("#top-sale .owl-carousel").owlCarousel({
        loop : true,
        nav : true,
        dots : false,
        responsive : {
            0:{
                items : 1
            },
            600:{
                items : 1
            },
            1000:{
                items : 1
            }
        }
    });
  });