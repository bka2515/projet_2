<input type="hidden" id="date" value="<?= $_POST['date'] ?>">

    <div id="scrollZone" class="col">

    <table class="table table-striped">

        <thead>

            <tr class="text-center">

                <th>Heure</th>

                <th>Numéro Tel</th>

                <th>Montant</th>

            </tr>

        </thead>

        <tbody id="tbody">

            <tr class="text-center">

                <td>18H50</td>

                <td>771544313</td>

                <td>100000</td>

            </tr>

        </tbody>

    </table></div>



<script>

    $(document).ready(function(){



        const date = $('#date').val();

        let offset = 0;

        const tbody = $('#tbody');

        $.ajax({

                type: "POST",

                url: "http://localhost/LIVE_AJAX/data/getVentes.php",

                data: {limit:7,offset:offset,date:date},

                dataType: "JSON",

                success: function (data) {

                    tbody.html('')

                    printData(data,tbody);

                    offset +=7

                }

            });



            //  Scroll

        const scrollZone = $('#scrollZone')

        scrollZone.scroll(function(){

        //console.log(scrollZone[0].clientHeight)

        const st = scrollZone[0].scrollTop;

        const sh = scrollZone[0].scrollHeight;

        const ch = scrollZone[0].clientHeight;



        console.log(st,sh, ch);

        

        if(sh-st <= ch){

            $.ajax({

                type: "POST",

                url: "http://localhost/LIVE_AJAX/data/getVentes.php",

                data: {limit:7,offset:offset,date:date},

                dataType: "JSON",

                success: function (data) {

                    

                    printData(data,tbody);

                    offset +=7;

                }

            });

        }

           

        })

    });



    function printData(data,tbody){

        $.each(data, function(indice,vente){

            tbody.append(`

            <tr class="text-center">

                <td>${vente.heure}</td>

                <td>${vente.telephone}</td>

                <td>${vente.montant}</td>

            </tr>

        `);

    });

}

</script>