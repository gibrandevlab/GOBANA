$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  if (scroll > 0) {
    $("nav").addClass("black");
  } else {
    $("nav").removeClass("black");
  }
});
