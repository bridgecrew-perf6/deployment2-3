function createCookie(name, value, timeInSeconds) {
    var date = new Date();
    date.setTime(date.getTime()+(timeInSeconds*1000));
    var expires = "; expires="+date.toGMTString();
 
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }




function themeConfigurator() {

    $(document).on('change', 'input[name="header-theme"]', ()=>{
        const context = $('input[name="header-theme"]:checked').val();
        console.log(context)
        $(".app").removeClass (function (index, className) {
            return (className.match (/(^|\s)is-\S+/g) || []).join(' ');
        }).addClass( 'is-'+ context );
    });

    $('#side-nav-theme-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-side-nav-dark");
        e.preventDefault();
    });
    
    $('#side-nav-fold-toogle').on('change', (e)=> {
        $('.app .layout').toggleClass("is-folded");
        e.preventDefault();
});

}

export default { themeConfigurator }