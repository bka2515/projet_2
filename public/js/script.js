function fileContentLoader(target, fileName, data={date:0}){

    target.load(`pages/${fileName}`,data,function(response, status,detail){        

         if(status === 'error'){

            $("#table").html(`<p class="text-center alert alert-danger col">Le contenu demandé est introuvable!</p>`);

            //ou bien

            //$("#table").html(`<p class="text-center alert alert-danger col">Code Erreur : ${detail.status}, ${detail.statusText}</p>`);

        }

    });

}





























//Events

$('form')



$(document).ready(function(){

    const form = $('#form');

    const table = $('#table');

    

    fileContentLoader(form,'formAdd.php');

    fileContentLoader(table,'table.php',{date:1});

})



//Link

$('.nav-link').click(function(e){

    const form = $('#form');

    const table = $('#table');

    if(e.target.id === 'accueil'){

        fileContentLoader(form,'formAdd.php');

        fileContentLoader(table,'table.php',{date:1});

    }else if(e.target.id === 'historique'){

        fileContentLoader(form,'formSearch.php');

        fileContentLoader(table,'table.php');

    }

});