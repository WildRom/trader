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

  //auto count real time - for 10 knots ship, 1 mile - 6 sec.
  // auto count user level, <1500 - 1, 1500 - 3000 2lvl, 3000 - 8000 3lvl
  // 8000 - 10000 4lvl, >10000 5lvl
  let dist, tm = 0;
  $('#inputNM').on('keyup', function(){
    dist = ($('#inputNM').val()) * 1;
    lvl = countLevel((dist));
    $('#userLVL').val(lvl);
    tm = Math.round(dist * 6 / 60);
    if(tm < 60){
      tm = 60;
    }
    $('#timeMinutes').val(tm);
  })

  function countLevel(distance){
    if(distance <= 1500){
      return 1;
    } else if (distance > 1500 && distance <= 3000) {
      return 2;
    } else if (distance > 3000 && distance <= 8000) {
      return 3;
    } else if (distance > 8000 && distance <= 10000) {
      return 4;
    } else if (distance > 10000) {
      return 5;
    }
  }

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