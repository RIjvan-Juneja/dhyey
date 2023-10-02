<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function submitData(action){
    $(document).ready(function(){
      var data = {
        action: action,
        id: $("#id").val(), // Add an input element with id="id" in your form
        name: $("#name").val(),
        email: $("#email").val(),
        gender: $("#gender").val(),
        hobbies: [], // Initialize an empty array for hobbies
        interests: [], // Initialize an empty array for interests
        about: $("#about").val() // Get the value of the textarea
      };

      // Iterate through checkboxes with name="hobbies[]"
      $("input[name='hobbies[]']:checked").each(function(){
        data.hobbies.push($(this).val()); // Add selected hobbies to the array
      });

      data.interests = $("#interests").val();

      $.ajax({
        url: 'function.php', 
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "Deleted Successfully"){
            $("#"+action).css("display", "none");
          }
        }
      });
    });
  }
</script>
