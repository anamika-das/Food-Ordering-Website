<script>
window.start_load = function(){
  $('body').prepend('<di id="preloader2"></di>')
}

window.end_load = function(){
  $('#preloader2').fadeOut('fast', function() {
    $(this).remove();
  })
}

window.uni_modal = function($title = '' , $url=''){
  start_load()
  $.ajax({
    url:$url,
    error:err=>{
      console.log()
      alert("An error occured")
    },
    success:function(resp){
      if(resp){
        $('#uni_modal .modal-title').html($title)
        $('#uni_modal .modal-body').html(resp)
        $('#uni_modal').modal('show')
        end_load()
      }
    }
  })
}

window.uni_modal_right = function($title = '' , $url=''){
  start_load()
  $.ajax({
    url:$url,
    error:err=>{
      console.log()
      alert("An error occured")
    },
    success:function(resp){
      if(resp){
        $('#uni_modal_right .modal-title').html($title)
        $('#uni_modal_right .modal-body').html(resp)
        $('#uni_modal_right').modal('show')
        end_load()
      }
    }
  })
}

window._conf = function($msg='',$func='',$params = []){
  $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
  $('#confirm_modal .modal-body').html($msg)
  $('#confirm_modal').modal('show')
}

window.alert_toast= function($msg = 'TEST',$bg = 'success'){
  $('#alert_toast').removeClass('bg-success')
  $('#alert_toast').removeClass('bg-danger')
  $('#alert_toast').removeClass('bg-info')
  $('#alert_toast').removeClass('bg-warning')

  if($bg == 'success')
    $('#alert_toast').addClass('bg-success')
  if($bg == 'danger')
    $('#alert_toast').addClass('bg-danger')
  if($bg == 'info')
    $('#alert_toast').addClass('bg-info')
  if($bg == 'warning')
    $('#alert_toast').addClass('bg-warning')
  $('#alert_toast .toast-body').html($msg)
  $('#alert_toast').toast({delay:3000}).toast('show');
}

window.load_cart = function(){
  $.ajax({
    url:'admin/ajax.php?action=get_cart_count',
    success:function(resp){
      if(resp > -1){
        resp = resp > 0 ? resp : 0;
        $('.item_count').html(resp)
      }
    }
  })
}

$('#login_now').click(function(){
  uni_modal("LOGIN",'login.php')
})

$('#new_account').click(function(){
  uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
})

$(document).ready(function(){
  load_cart()
})
</script>