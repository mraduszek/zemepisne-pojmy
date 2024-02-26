<?php

echo $this->extend('layout/master');

echo $this->section("content");

?>
   
<h1>Random Terms</h1>
    <button onclick="getRandomTerms()">Losovat</button>
    <ul id="randomTermsList"></ul>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
        function getRandomTerms() {
            $.ajax({
                url: '<?= site_url("pojmy/zkouseni"); ?>',
                type: 'GET',
                success: function (data) {
                    console.log("Data:", data);

                    var termsList = $('#randomTermsList');
                    termsList.empty();

                    
                        $.each(data.random_terms, function (index, term) {
                            termsList.append('<li>' + term.nazev + '</li>');
                        });
                    
                }
            });
        }
    </script>

    <button onclick="getRandomTerms()">Losovat</button>
    <ul id="randomTermsList"></ul>

<?php

echo $this->endSection();
?>
