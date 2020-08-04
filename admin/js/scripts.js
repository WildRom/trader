$(function(){
  let get_ports = 'get_ports';
  let except = 1;
  $.post(
    'server.php',
    {get_ports: get_ports},
    function(data){
      $('#port-start').html('').append(data);
      // $('#port-end').html('').append(data);
    }
  )
  $('#port-start').on('change', function(){
    except = $(this).val();
    myPost(except);
  })
  myPost(except);


  function myPost(exc) {
    $.post(
      'server.php',
      {
        get_ports: get_ports,
        except: exc
      },
      function(data){
        $('#port-end').html('').append(data);
      }
    )
  }
})