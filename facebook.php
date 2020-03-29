<script>
  function statusChangeCallback(response) {
    // console.log(response);
    if (response.status === 'connected') {
        FB.api('/me', function (response) {
          $('#profileName').html(response.name);
          $('#profileId').html(response.id);
          $('#profileImage').css('background-image', 'url(https://graph.facebook.com/' + response.id + '/picture?type=normal');
        });
        $('#profileImage').show();
    } else {
        if (window.location.href.indexOf("login.php") > -1) {
          document.getElementById('status').innerHTML = 'Registrate con Facebook para participar: ';
        } else {
          window.location.href = '/login.php';
        }
    }
}

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{xxxxxxxxxxxxxx}',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });
      
    FB.AppEvents.logPageView();  

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
  }); 
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
