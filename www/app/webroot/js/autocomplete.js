if (typeof jQuery === "undefined") { throw new Error("Bootstrap requires jQuery") }

$(document).ready(function(){
  // Caching the movieName textbox:
  var username = $('#username');
   
  // Defining a placeholder text:
  username.defaultText('Search for people');
   
  // Using jQuery UI's autocomplete widget:
  username.autocomplete({
    minLength    : 2,
    source        : 'users/search'
  });
   
  });
   
  // A custom jQuery method for placeholder text:
   
  $.fn.defaultText = function(value){
   
  var element = this.eq(0);
  element.data('defaultText',value);
   
  element.focus(function(){
  if(element.val() == value){
  element.val('').removeClass('defaultText');
  }
  }).blur(function(){
  if(element.val() == '' || element.val() == value){
  element.addClass('defaultText').val(value);
  }
  });
   
  return element.blur();
}


Read more: http://blogfreakz.com/cakephp/cakephp-jquery-autocomplete-tutorial/#ixzz2qK5Not6T
  });