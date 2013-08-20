/*$('.subscribe').on("click", function(){
  vote = $(this).attr("data-vote");
  article = $(this).attr("data-article");
  rateArticle(vote, article);
})*/$(document).ready(function(){  
  
 $('.subscribe').on("click", function(){
  vote = $(this).attr("data-vote");
  article = $(this).attr("data-article");
  alert(article+'dfdgfgfgfg?');
  rateArticle(vote, article);
}) 
})


function rateArticle(vote, article){ 
  var data = 'vote='+vote+'&articleID='+article;
  $.ajax({
     type: 'POST',
     url: 'includes/subscribe.php',
     data: data,
     success: function(votes){
        alert ("failed to load loaded");
     }
	 error:function(){
        alert ("successfully loaded");
      }   
   });
}/*
$(document).ready(function(){  
   $('#newsletter-signup').submit(function(){  
  
        //do our ajax stuff here  
          
        //prevent form from submitting  
        return false;  
    })  
})

    var form = $(this),  
        formData = form.serialize(),  
        formUrl = form.attr('action'),  
        formMethod = form.attr('method'),   
        responseMsg = $('#signup-response')  
*/