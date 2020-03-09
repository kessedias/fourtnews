//definindo jquery no moodle
define(['jquery'], function($){

    //conteúdo jquery
    
    //one star
    $('#btn1').click(function() { 
        $('#btn1').addClass('btn-click');
        $('#btn2').removeClass('btn-click');
        $('#btn3').removeClass('btn-click');
        $('#btn4').removeClass('btn-click');
        $('#btn5').removeClass('btn-click');
        alert('Notícia muito ruim, é fake news'); 
    });

    //two stars
    $('#btn2').click(function() { 
        $('#btn1').addClass('btn-click');
        $('#btn2').addClass('btn-click');
        $('#btn3').removeClass('btn-click');
        $('#btn4').removeClass('btn-click');
        $('#btn5').removeClass('btn-click');
        alert('Não gostei não em!'); 
    });

    //three stars
    $('#btn3').click(function() { 
        $('#btn1').addClass('btn-click');
        $('#btn2').addClass('btn-click');
        $('#btn3').addClass('btn-click');
        $('#btn4').removeClass('btn-click');
        $('#btn5').removeClass('btn-click');
        alert('Bom, ta quase lá. Mas ainda acho que é fake news'); 
    });
    
    //four stars
    $('#btn4').click(function() { 
        $('#btn1').addClass('btn-click');
        $('#btn2').addClass('btn-click');
        $('#btn3').addClass('btn-click');
        $('#btn4').addClass('btn-click');
        $('#btn5').removeClass('btn-click');
        alert('Bem legal essa notícia em!'); 
    });

    //five stars
    $('#btn5').click(function() { 
        $('#btn1').addClass('btn-click');
        $('#btn2').addClass('btn-click');
        $('#btn3').addClass('btn-click');
        $('#btn4').addClass('btn-click');
        $('#btn5').addClass('btn-click');
        alert('Vou até postar no grupo do ZapZap da família'); 
    });
    

    //ao clicar na tecla enter, o js muda a imagem da noticia
    //easteregg
    $(document).ready(function(){
        $(document).keypress(function(e){
            if(e.wich == 13 || e.keyCode == 13){
           $('#change_img').attr('src', '../images/cat.gif')
            }
        });
    });
    
    //função para contar o número de cliques
    count = 0;
    var counting = $('#change_img').click(function(){
        console.log('Cliquei');
        
    });
    
    
   counting.click(function(){
        count +=1;
        if(count === 5){
            $('#change_img').attr('src', '../images/cat.gif')
        }
        console.log(count);
   });
   
});

