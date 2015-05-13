<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/boxesFx.js"></script>
<script src="js/modernizr.custom.js"></script>
<script>
  document.querySelector( "#nav-toggle" )
    .addEventListener( "click", function() {
      this.classList.toggle( "active" );
    });
</script>
<script>
$("#nav-toggle").click(function(e){
      e.preventDefault();
      $(".container").toggleClass("push");
      $("#menu").toggleClass("show");
    });
    $("#menu a").click(function(event){
      event.preventDefault();
      if($(this).next('ul').length){
        $(this).next().toggle('fast');
        $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
      }
    });
</script>
</body>
</html>
